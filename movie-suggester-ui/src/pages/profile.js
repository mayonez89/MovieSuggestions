import React from 'react'
import { Container, Header, Image, Input, Button, Placeholder } from 'semantic-ui-react' 
import NavBar from '../components/navbar'; 
import config from '../config'
import '../style/utils.css'
import axios from 'axios'

export default class Profile extends React.Component {
    constructor(props) {
        super(props);  
        
        this.state = {
          profile : null,
          user: null,
        }
      }

      componentDidMount(){
        let user = localStorage.getItem('id')
        this.setState({
          user: user,
          head  : {
           headers: {  'Access-Control-Allow-Origin' : '*',
           hash : localStorage.getItem('hash')
         }
         }
       }, () => {
        console.log("tijs", this.state)
       this.getUserProfile()

       })
       

       }
 
       getUserProfile = () => {
         axios.get(`${config.base_URL}/profile/${this.state.user}`, this.state.head).then((resp) => {
 
           console.log('prd',resp.data)
           this.setState({profile : resp.data})
         }).catch(e => {
           console.log('err in getting content', e)
         })
       }
     

    render() {
      return (
        <>
       <NavBar/>
{ !this.state.profile &&        <Container  className="p50" textAlign="center">
            <PlaceholderExampleParagraph/>
       </Container>}
       {
         this.state.profile &&
         <Container className='p50' >

           </Container>
       }
        </>
      );
    }
  }
  

  const PlaceholderExampleParagraph = () => (
    <Placeholder>
      <Placeholder.Paragraph>
        <Placeholder.Line />
        <Placeholder.Line />
        <Placeholder.Line />
        <Placeholder.Line />
        <Placeholder.Line />
      </Placeholder.Paragraph>
      <Placeholder.Paragraph>
        <Placeholder.Line />
        <Placeholder.Line />
        <Placeholder.Line />
      </Placeholder.Paragraph>
    </Placeholder>
  )
  