import React, {Component} from 'react';
import UserService from '../../services/user.service';

export default class UserDetails extends Component{

    constructor(props){
        super(props);
        this.state = {
            user: {},

        }
    }

    async componentDidMount(){
        let {id} = this.props.match.params;
        let response = await UserService.details(id);
        this.setState({user:response.data});
        console.log(response);
    }


    async handleDelete(){
        let {user} = this.state;
        await UserService.delete();
        this.props.history.push('/utilisateurs');
    }

    render(){
        let{user} = this.state;
        return <div className="container">
            <h1>Nom - {user && user.name}<br></br></h1>
            <h2>email : <br></br></h2>
            <p>{user && user.email}</p>
            <button className="btn btn-danger" onClick={()=>this.handleDelete()}>Supprimer</button>
        </div>
    }
}