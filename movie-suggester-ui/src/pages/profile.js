import React from 'react'
import { Container, Header, Image, Input, Button, Placeholder } from 'semantic-ui-react' 
import NavBar from '../components/navbar'; 

import '../style/utils.css'

export default class Profile extends React.Component {
    constructor(props) {
        super(props);      
      }
     

    render() {
      return (
        <>
       <NavBar/>
        <Container  className="p50" textAlign="center">
            <PlaceholderExampleParagraph/>
       </Container>
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
  