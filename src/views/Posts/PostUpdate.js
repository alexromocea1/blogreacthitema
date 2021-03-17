import React, {Component} from 'react';
import PostService from "../../services/post.service";

export default class PostUpdate extends Component{

    constructor(props) {
        super(props);
        this.state = {
            post: {},
            title: "",
            body: ""
        }
    }

    async componentDidMount() {
        let {id} = this.props.match.params;
        let response = await PostService.details(id);
        this.setState({
            post: response.data,
            title: response.data.title,
            body: response.data.body
        });
    }

    handleChange(e){
        this.setState({
            [e.target.id]: e.target.value
        });
    }

    async handleSubmit(e){
        e.preventDefault();
        let {post, title, body} = this.state;

        let data = {
            title: title,
            body: body
        }

        await PostService.update(post.id, data);
        this.props.history.push(`/articles/${post.id}`);
    }

    render() {
        let {post, title, body} = this.state;
        return <div className="container">
            <h1>Modification de l'article - {post.title}</h1>

            <form onSubmit={(e) => this.handleSubmit(e)}>
                <div className="form-group">
                    <label>Titre</label>
                    <input type="text" className="form-control" id="title" required value={title} onChange={(e) => this.handleChange(e)}/>
                </div>
                <div className="form-group">
                    <label>Contenu</label>
                    <textarea id="body" rows="5" className="form-control" required value={body} onChange={(e) => this.handleChange(e)}/>
                </div>
                <button type="submit" className="btn btn-primary">Modifier</button>
            </form>


        </div>
    }
}
