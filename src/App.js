import React, {Component} from 'react';
import {BrowserRouter, Route,Switch} from 'react-router-dom'; 
import Header from './components/Header';
import Home from './views/Home';
import PostAdd from './views/Posts/PostAdd';
import PostsDetails from './views/Posts/PostsDetails';
import PostsList from './views/Posts/PostsList';
import PostUpdate from './views/Posts/PostUpdate';
import UserAdd from './views/Users/UserAdd';
import UserList from './views/Users/UserList';
import UserUpdate from './views/Users/UserUpdate';
import UserDetail from './views/Users/UserDetails';

export default class App extends Component{


  render(){

    return <BrowserRouter>

      <Header/>
    <Switch>
      <Route exact path="/" component={Home}/>
      <Route exact path="/articles" component={PostsList}/>
      <Route exact path="/articles/ajouter" component={PostAdd}/>
      <Route exact path="/articles/:id" component={PostsDetails}/>
      <Route exact path="/articles/:id/modifier" component={PostUpdate}/>

      <Route exact path="/utilisateurs" component={UserList}/>    



      
      <Route exact path="/utilisateurs/ajouter" component={UserAdd}/>
      <Route exact path="/utilisateurs/:id" component={UserDetail}/>
      <Route exact path="/utilisateurs/:id/modifier" component={UserUpdate}/>
    </Switch>

    </BrowserRouter>
  }

}