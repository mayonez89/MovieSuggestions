import React from 'react'
import { Container,Card, Header, Icon, Image, Input, Button } from 'semantic-ui-react' 
import NavBar from '../components/navbar';
import axios from 'axios'
import Placeholders from '../components/placeholder';
import '../style/utils.css'


export default class Movie extends React.Component {
    constructor(props) {
        super(props); 

        console.log(this.props.location.state)
        this.state = {
            movie : null,
            head: null,
            genre: null
        }
        
      }

      componentDidMount(){
        this.getMovie()
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
     

      getMovie = () => {
        axios.get(this.props.location.state.movie, this.state.head).then((resp) => {
          console.log("mov", resp.data.entities[0].links[0].href)
          console.log("mov", resp.data)

          this.setState({movie : resp.data.properties})
          this.getGenre(resp.data.entities[0].links[0].href)
        }).catch(e => {
          console.log('err in getting content', e)
        }) 

      }

      getGenre = (genre) => {
        console.log('weget',genre, this.state.head)
        axios.get(genre, this.state.head).then((resp) => {
          console.log("gen", resp.data.entities[0].properties.name) 
          this.setState({genre:resp.data.entities[0].properties.name })
          // this.setState({genre : resp.data.properties})
        }).catch(e => {
          console.log('err in getting genre', e)
        }) 
      } 


    render() {
      return (
        <>
        <NavBar/>

        {!this.state.movie && <Placeholders/>}

      {this.state.movie && 
       <Container className="p150"    > 
        <Card fluid>
     {Player(this.state.movie.trailer_url)}
    <Card.Content  >
      <Card.Header>{this.state.movie.title}</Card.Header>
      <Card.Meta>
        <span className='date'>{this.state.movie.release_date}  -   {this.state.genre}</span>
      </Card.Meta>
      <Card.Description>
        {this.state.movie.description}
      </Card.Description>
    </Card.Content>
    <Card.Content extra>
      <p>
      <a>
        <Icon name='user' />
        {this.state.movie.director}
      </a>
      </p>
      {/* <div className='ui two buttons'>
          <Button basic color='red' onClick={() => this.state.delete(this.state.movie.properties.slug)} >
          <Icon name='trash' />
          </Button >
          <Button basic color='green' onClick={() => this.state.favorite(this.state.movie.properties.slug)} >
          <Icon name='heart' />
          </Button>
        </div> */}
    </Card.Content>
  </Card>
        </Container>}
        </>
      );
    }
  }
  
  function Player(url) {
    return (
      
 
        <iframe src={url}>
         </iframe>
      
  
    )
  }