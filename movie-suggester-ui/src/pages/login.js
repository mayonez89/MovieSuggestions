import React from 'react'
import { Container, Header, Image, Input, Button } from 'semantic-ui-react'
import '../style/utils.css'
import '../style/login.css'
import img from '../assets/login.png'
import { Link } from "react-router-dom";

export default class Login extends React.Component {
    constructor(props) {
        super(props); 

        this.state = {
            showSignup: false
        }
      }
    
      changeView = () => {
          this.setState({showSignup: !this.state.showSignup})
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
            <Input placeholder='Email' focus type='email' />
            </div>
            <br/>
            <div>
            <Input placeholder='Password' focus type='password' />
            </div>

            <div className='p20' >
            <Link  to="/home">
                 <Button basic color='teal'>
                  
                    Login
                  
                 </Button>
                 </Link>
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
              <Input placeholder='Email' focus   type='email' />
              </div>
              <br/>
              <div>
              <Input placeholder='Password' focus type='password' />
              </div>
              <br/>
              <div>
              <Input placeholder='Confirm Password' focus type='password' />
              </div>
  
              <div className='p20' >
                   <Button basic color='teal'>
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
        </>
      );
    }
  }
  