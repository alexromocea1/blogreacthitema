import React, {Component} from 'react';
import UserService from "../../services/user.service";

export default class UserUpdate extends Component{

    constructor(props) {
        super(props);
        this.state = {
            user: {},
            name: "",
            email: ""
        }
    }

    async componentDidMount() {
        let {id} = this.props.match.params;
        let response = await UserService.details(id);
        this.setState({
            user: response.data,
            name: response.data.name,
            email: response.data.email
        });
    }

    handleChange(e){
        this.setState({
            [e.target.id]: e.target.value
        });
    }

    async handleSubmit(e){
        e.preventDefault();
        let {user, name, email} = this.state;

        let data = {
            name: name,
            email: email
        }

        await UserService.update(user.id, data);
        this.props.history.push(`/utilisateurs/${user.id}`);
    }

    render() {
        let {user, name, email} = this.state;
        return <div className="container">
            <h1>Modification de l'utilisateur - {user.name}</h1>

            <form onSubmit={(e) => this.handleSubmit(e)}>
                <div className="form-group">
                    <label>Nom</label>
                    <input type="text" className="form-control" id="name" required value={name} onChange={(e) => this.handleChange(e)}/>
                </div>
                <div className="form-group">
                    <label>Email</label>
                    <textarea id="email" rows="5" className="form-control" required value={email} onChange={(e) => this.handleChange(e)}/>
                </div>
                <button type="submit" className="btn btn-primary">Modifier</button>
            </form>


        </div>
    }
}
