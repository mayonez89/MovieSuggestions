import React from 'react'
import { Container, Header, Image, Input, Button, Placeholder } from 'semantic-ui-react' 
import NavBar from '../components/navbar';
import Placeholders from '../components/placeholder';

import '../style/utils.css'

export default class Home extends React.Component {
    constructor(props) {
        super(props);      
      }
     

    render() {
      return (
        <>
       <NavBar/>

       <Container  textAlign='center' className="p20" >
          <Input icon='search' fluid focus placeholder='Search...' />
       </Container>

       <Container  textAlign='center' className="p50"  >
         <p>Our recommendations</p>
       </Container>

        <Placeholders/>
       
        </>
      );
    }
  }
  