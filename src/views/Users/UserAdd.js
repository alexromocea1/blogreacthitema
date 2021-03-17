import React, {Component} from 'react';
import UserService from "../../services/user.service";

export default class UserAdd extends Component{

    constructor(props) {
        super(props);
        this.state = {
            name: null,
            email: null
        }
    }

    handleChange(e){
        this.setState({
            [e.target.id]: e.target.value
        });
    }

    async handleSubmit(e){
        e.preventDefault();
        let {name, email} = this.state;

        let data = {
            name: name,
            email: email,
            userId: 1
        }

        await UserService.create(data);
        this.props.history.push('/utilisateurs');
    }

    render() {
        return <div className="container">
            <h1>Ajouter votre utilisateur</h1>

            <form onSubmit={(event) => this.handleSubmit(event)}>
                <div className="form-group">
                    <label>Nom</label>
                    <input type="text" id="name" className="form-control" required
                        onChange={(event) => this.handleChange(event)}/>
                </div>
                <div className="form-group">
                    <label>Email</label>
                    <textarea id="email" rows="5" className="form-control" required
                        onChange={(event) => this.handleChange(event)}/>
                </div>
                <button type="submit" className="btn btn-primary">Ajouter</button>
            </form>
        </div>
    }

}
