import React from 'react'
import { Container, Header, Image, Input, Button } from 'semantic-ui-react'
import '../style/utils.css'
import '../style/login.css'
import img from '../assets/login.png'
import { Link, Redirect } from "react-router-dom";
import axios from 'axios'
import config from '../config'
   
export default class Login extends React.Component {
    constructor(props) {
        super(props); 

        this.state = {
            showSignup: false,
            email : null,
            password: null,
            isLoggedin: false,
            signupEmail: null,
            signupPass: null,
            signupConfirmPass :null,

        }
      }
    
      changeView = () => {
          this.setState({showSignup: !this.state.showSignup})
      }

      login = () => {
       let  params = {
          email: this.state.email,
          password : this.state.password
        }
        axios.post(`${config.base_URL}/login`, params)
        .then((resp) => {
          console.log('resp', resp)
          localStorage.setItem('hash', resp.data.hash)
          localStorage.setItem('id', resp.data.id)
          this.setState({isLoggedin: true})
        })
        .catch((e) => {
          console.log("error", e)
          alert('something went wrong, please try again')
        })
      }

      register = () => {
        if(this.state.signupPass != this.state.signupConfirmPass){
          alert('passwords do not match')
        
        } else {
          console.log("sate", this.state)
          let  params = {
            email: this.state.signupEmail,
            password : this.state.signupPass
          }
          axios.post(`${config.base_URL}/register`, params)
          .then((resp) => {
            console.log('resp', resp)
            localStorage.setItem('hash', resp.data.hash)
            localStorage.setItem('id', resp.data.id)
            this.setState({isLoggedin: true})
          })
          .catch((error) => {
            console.log("error", error)
            alert('something went wrong, please try again')
          })


        }


        
      }

      componentDidMount(){
        console.log("checking if user is logged in already")  
        if(localStorage.getItem('hash') && localStorage.getItem('hash').length != 0) {
          console.log('logged in')
          this.setState({isLoggedin: true})
        } else {console.log('not logged in')}

      }

    render() {
      return (
        <>
          <Container textAlign='center' className='p50'>
          <div> Movie Suggestor</div>
          <div className="center" >
          <Image src={img} size='large'/>
          </div>
  { !this.state.showSignup &&      <div>
            <div className='p20'>
            <div> Login</div>
            </div>
            <div>
            <Input placeholder='Email' focus type='email' onChange= {(e) => this.setState({email: e.target.value})} />
            </div>
            <br/>
            <div>
            <Input placeholder='Password' focus type='password'  onChange= {(e) => this.setState({password: e.target.value})} />
            </div>

            <div className='p20' > 
                 <Button basic color='teal' onClick={() => this.login()}>
                  
                    Login
                  
                 </Button> 
            </div>
            <div>Or</div>
            <div className='p20'>
                 <Button basic color='olive' onClick={() => this.changeView()} >
               Signup
               </Button>
            </div> 
       
        </div>}
        { this.state.showSignup &&
              <div>
              <div className='p20'>
              <div>Signup</div>
              </div>
              <div>
              <Input placeholder='Email' focus   type='email' onChange= {(e) => this.setState({signupEmail: e.target.value})} />
              </div>
              <br/>
              <div>
              <Input placeholder='Password' focus type='password' onChange= {(e) => this.setState({signupPass: e.target.value})} />
              </div>
              <br/>
              <div>
              <Input placeholder='Confirm Password' focus type='password' onChange= {(e) => this.setState({signupConfirmPass: e.target.value})} />
              </div>
  
              <div className='p20' >
                   <Button basic color='teal' onClick={() => this.register()}>
                      Sign Up
                   </Button>
              </div>
              <div>Or</div>
              <div className='p20' onClick={() => this.changeView()}>
                   <Button basic color='olive'>
                 Login
                 </Button>
              </div>
         
          </div>
        }
          </Container>

        {
          this.state.isLoggedin &&
          <Redirect to="/home" />

        }
        </>
      );
    }
  }
  