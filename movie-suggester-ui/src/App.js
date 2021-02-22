import './style/App.css'
import { Route, Switch } from 'react-router-dom'
import Home from './pages/home'
import Login from './pages/login'
import FourOFour from './pages/404'
 
function App() {
    return (
        <main>
            <Switch>
                <Route path="/" component={Login} exact />
                <Route path="/home" component={Home} />
                <Route path="/profile" component={Home} />
                <Route component={FourOFour} />
            </Switch>
        </main>
    )
}

export default App;
