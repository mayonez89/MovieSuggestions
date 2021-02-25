import React from 'react'
import { Container, Header, Image, Input, Button, Placeholder } from 'semantic-ui-react' 
import NavBar from '../components/navbar';
import Placeholders from '../components/placeholder';

import '../style/utils.css'

export default class SearchResults extends React.Component {
    constructor(props) {
        super(props);      
      }
     

    render() {
      return (
        <>
       <NavBar/>
 

        <Placeholders/>
       
        </>
      );
    }
  }
  