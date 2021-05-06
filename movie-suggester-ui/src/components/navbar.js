import React from 'react'
import { Icon,  Menu, Segment  } from 'semantic-ui-react' 
import { Link, Redirect} from "react-router-dom";

export default class NavBar extends React.Component {
    constructor(props) {
        super(props);  

        this.state = {
          logout: false,
          loggedin: false,
        }
      }
      
      logout = () =>{
        localStorage.removeItem('hash')
        localStorage.removeItem('id')
        this.setState({logout: true})
      }

      componentDidMount(){
        let user = localStorage.getItem('hash')
        if(user){
          this.setState({loggedin:true})
        }else{
        this.setState({loggedin:false})
        }
      }
 
    render() { 
      return (
        <>
    < Segment inverted>
        <Menu inverted pointing secondary>
        { this.state.loggedin &&
          <Menu.Item
            name='Home'
          >
             <Link  to="/home">
            
               <Icon name='home' />
              Home
              </Link>
               </Menu.Item>}
               
               { this.state.loggedin &&    <Menu.Item
            name='Profile'
             
          >
            <Link to="/profile">
              <Icon name='user' />
              Profile
              </Link>
               </Menu.Item> }

               { this.state.loggedin &&       <Menu.Item
            name='Profile'
             
          >
            <Link to="/favorite">
              <Icon name='heart' />
              Favourites
              </Link>
               </Menu.Item>
    }

{ this.state.loggedin && <Menu.Menu position='right'>
          <Menu.Item
            name='Logout'
            onClick = {() => {this.logout()}}
          >
              <Icon name='logout' />
              Logout
               </Menu.Item>
          </Menu.Menu>
    }
        </Menu>
      </Segment>

      {
        this.state.logout && 
        <Redirect to="/" />

      }
        </>
      );
    }
  }
  