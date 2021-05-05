import React from 'react'
import { Container, Header, Image, Input, Button, Icon, Card, Grid } from 'semantic-ui-react' 
import NavBar from '../components/navbar';
import Placeholders from '../components/placeholder';
import config from '../config'
import '../style/utils.css'
import axios from 'axios'

export default class Favorite extends React.Component {
    constructor(props) {
        super(props); 

        this.state = {
            movies : null,
            user: null, 
          }
        
      }

      componentDidMount(){
        let user = localStorage.getItem('id')
        this.setState({user: user},() => {
            this.getAll()
        } )
       

       }

       delete = (content) => {
           
        axios.delete(`${config.base_URL}/users/${this.state.user}/favorites/${content}`).then((resp) => {
          console.log(resp.data)
          this.getAll()
        })
      }

       getAll = () => {
        axios.get(`${config.base_URL}/users/${this.state.user}/favorites`).then((resp) => {
        console.log('res', resp)
        
            this.setState({movies : resp.data.entities})
           
         
        }).catch(e => {
          console.log('err in getting fav', e)
        })
      }
     

    render() {
      return (
        <>
           <NavBar/>
           {!this.state.movies && <Placeholders/>}

           {this.state.movies && 

<Container>
    <Grid columns={3} stackable>
    {
             this.state.movies.map(movie => {
              return (
                <MovieCard movie={movie} delete={this.delete}   />
              )
              
            }) 
    }
    </Grid>
</Container>


}
 


        </>
      );
    }
  }
  

  class MovieCard extends React.Component{
    constructor(props) {
      super(props); 
      // console.log('props', props)
      this.state = {
        
      }
    }
  
    
  
    render() {
      return ( 
  
        <>
        <Grid.Column> 
      <Card>
       {Player(this.props.movie.properties.trailer_url)}
      <Card.Content>
        <Card.Header>{this.props.movie.properties.title}</Card.Header>
        <Card.Meta>
          <span className='date'>{this.props.movie.properties.release_date}</span>
        </Card.Meta>
        <Card.Description>
          {this.props.movie.properties.description}
        </Card.Description>
      </Card.Content>
      <Card.Content extra>
        <p>
        <a>
          <Icon name='user' />
          {this.props.movie.properties.director}
        </a>
        </p>
        <div className='ui two buttons'>
            <Button basic color='red' onClick={() => this.props.delete(this.props.movie.properties.slug)} >
            <Icon name='trash' />
            </Button > 
          </div>
      </Card.Content>
    </Card>
    </Grid.Column>
        </>
      )
  
  
  }
  
  }
  
  function Player(url) {
    return (
      
      <div> 
        <iframe src={url}>
  </iframe>
      </div>
  
    )
  }