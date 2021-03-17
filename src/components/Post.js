import React, {Component} from 'react';
import {Link} from "react-router-dom";

export default class Post extends Component{

    render() {
        let {post} = this.props;
        return <div className="card">
                <div className="card-body">
                    <h5 className="card-title">{post.title}</h5>
                    <p className="card-text">{post.body}</p>
                    <Link to={`/articles/${post.id}`} className="btn btn-primary">Détails</Link>
                    <Link to={`/articles/${post.id}/modifier`} className="btn btn-warning">Modifier</Link>
                </div>
        </div>
    }
}
