import React, {Component} from 'react';
import PostService from "../../services/post.service";

export default class PostAdd extends Component{

    constructor(props) {
        super(props);
        this.state = {
            title: null,
            body: null
        }
    }

    handleChange(e){
        this.setState({
            [e.target.id]: e.target.value
        });
    }

    async handleSubmit(e){
        e.preventDefault();
        let {title, body} = this.state;

        let data = {
            title: title,
            body: body,
            userId: 1
        }

        await PostService.create(data);
        this.props.history.push('/articles');
    }

    render() {
        return <div className="container">
            <h1>Ajouter votre article</h1>

            <form onSubmit={(event) => this.handleSubmit(event)}>
                <div className="form-group">
                    <label>Titre</label>
                    <input type="text" id="title" className="form-control" required
                        onChange={(event) => this.handleChange(event)}/>
                </div>
                <div className="form-group">
                    <label>Contenu</label>
                    <textarea id="body" rows="5" className="form-control" required
                        onChange={(event) => this.handleChange(event)}/>
                </div>
                <button type="submit" className="btn btn-primary">Ajouter</button>
            </form>
        </div>
    }

}
