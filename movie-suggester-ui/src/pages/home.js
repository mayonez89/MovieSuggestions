import React from 'react'
import { Container, Header,Grid, Image, Input, Button, Placeholder, Icon, Card } from 'semantic-ui-react' 
import NavBar from '../components/navbar';
import Placeholders from '../components/placeholder';
import config from '../config'
import '../style/utils.css'
import axios from 'axios'
import { Redirect } from 'react-router-dom';


export default class Home extends React.Component {
    constructor(props) {
        super(props); 
        
        this.state = {
          movies : null,
          user: null,
          head: null,
        }

        
       
      }

   
      componentDidMount(){
       this.getAll()
       let user = localStorage.getItem('id')
       this.setState({
         user: user,
         head  : {
          headers: {  'Access-Control-Allow-Origin' : '*',
          hash : localStorage.getItem('hash')
        }
        }
      })
      }

      getAll = () => {
        axios.get(`${config.base_URL}/contents`, this.state.head).then((resp) => {

          console.log('we',resp.data)
          this.setState({movies : resp.data.entities})
        }).catch(e => {
          console.log('err in getting content', e)
        })
      }

      delete = (content) => {
        axios.delete(`${config.base_URL}/contents/${content}`).then((resp) => {
          // console.log(resp.data)
          this.getAll()
        })
      }

      favorite = (content) => {
        let params = {
          favorite: content
        } 
        axios.post(`${config.base_URL}/users/${this.state.user}/favorites`, params, this.state.head ).then((resp) => {
          // console.log(resp.data)
          alert('added')
        }).catch(e => {
          console.log('err in fav', e)
          alert('something went wrong, please try again')
        })
      }


    render() {
      return (
        <>
       <NavBar/>

       <Container  textAlign='center' className="p20" >
          <Input icon='search' fluid focus placeholder='Search...' />
       </Container>

       <Container  textAlign='center' className="p50"  >
         <p>All Movies</p>
       </Container>

        {!this.state.movies && <Placeholders/>}

        {this.state.movies && 

        <Container>
            <Grid columns={3} stackable>
            {
                     this.state.movies.map(movie => {
                      return (
                        <MovieCard movie={movie} delete={this.delete} favorite={this.favorite} />
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
    <Card.Content onClick={() => this.setState({ redirect :true })}>
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
    {this.state.user &&  <div className='ui two buttons'>
          <Button basic color='red' onClick={() => this.props.delete(this.props.movie.properties.slug)} >
          <Icon name='trash' />
          </Button >
          <Button basic color='green' onClick={() => this.props.favorite(this.props.movie.properties.slug)} >
          <Icon name='heart' />
          </Button>
        </div>}
    </Card.Content>
  </Card>
  </Grid.Column>

  


  { this.state.redirect &&

<Redirect
to={{
  pathname: "/movie", 
  state: { movie: this.props.movie.links[0].href }
}}
/>


    }

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