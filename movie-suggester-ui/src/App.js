import './style/App.css'
import { Route, Switch } from 'react-router-dom'
import Home from './pages/home'
import Login from './pages/login'
import Profile from './pages/profile'
import FourOFour from './pages/404'
import Favorite from './pages/fav'
 
function App() {
    return (
        <main>
            <Switch>
                <Route path="/" component={Login} exact />
                <Route path="/home" component={Home} />
                <Route path="/profile" component={Profile} />
                <Route path="/favorite" component={Favorite} />
                <Route component={FourOFour} />
            </Switch>
        </main>
    )
}

export default App;
