import React, {Component} from 'react';
import Post from '../components/Post';
import PostService from '../services/post.service';
import UserService from '../services/user.service';
import User from '../components/User';

export default class Home extends Component{

    constructor(props){
        super(props);
        this.state = {
            posts:[],
            users:[]
        };
    }

    async componentDidMount(){
        let posts = await PostService.list(1);
        let users = await UserService.list(1);
        this.setState({posts: posts, users:users}); 
    }

    render(){
        let {posts,users} = this.state;
        return <div className="container"><h1>Homepage du blog</h1>
                    <p>Lorem ipsum dolor bla bla bla.</p>

                <h3>Les derniers posts</h3>
                <div className="row">

                    {posts.length === 0 && <p>Aucun posts pour le moment...</p>}

                    {posts.length > 0 && posts.map(post=>{
                        return <div className="col-md-4"><Post post={post}/></div>
                    })}

                   
                </div>
                
                <div className="row">

                    {users.length === 0 && <p>Aucun users pour le moment...</p>}

                    {users.length > 0 && users.map(user=>{
                        return <div className="col-md-4"><User user={user}/></div>
                    })}

                   
                </div>
        </div>
    }

}