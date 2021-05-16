import React from 'react'
import { Container, Header,Grid, Image, Input, Button, Placeholder, Icon, Card } from 'semantic-ui-react' 
import NavBar from '../components/navbar';
import Placeholders from '../components/placeholder';
import config from '../config'
import '../style/utils.css'
import axios from 'axios'

export default class Home extends React.Component {
    constructor(props) {
        super(props); 
        
        this.state = {
          movies : null
        }
      }
     
      componentDidMount(){
        axios.get(`${config.base_URL}/contents`).then((resp) => {
          this.setState({movies : resp.data.entities})
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
                        <MovieCard movie={movie} />
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
    this.state = {
      
    }
  }
  

  render() {
    return ( 

      <>
      <Grid.Column>
    <Card
      image= {Player(this.props.movie.properties.trailer_url)}
      header={this.props.movie.properties.title}
      meta={this.props.movie.properties.release_date}
      description={this.props.movie.properties.description}
      extra={this.props.movie.properties.director}
  />
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