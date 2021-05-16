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
          password : null,
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
        // console.log("tijs", this.state) 

       })
       

       }
 
       updatePass = () => {
      
         axios.put(`${config.base_URL}/update-password/`, {'new-password': this.state.password}, this.state.head).then((resp) => {
 
           if(resp.status == 200) {
             alert("password changed")
             this.setState({password: null})
           }
         }).catch(e => {
           console.log('err in getting content', e)
           alert('something went wrong. Please try again')
         })
       }
     

    render() {
      return (
        <>
       <NavBar/>
          <div  className='p50 center' >
          Change password
          </div>
         <div  className='p50 center' >
                       <Input placeholder='Password' focus type='text'  onChange= {(e) => this.setState({password: e.target.value})} />
                       <div className='p20' > 
                 <Button basic color='teal' onClick={() => this.updatePass()}>
                  
                    Change password
                  
                 </Button> 
            </div>

           </div> 
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
  