import axios from "axios";
const baseUrl = "https://jsonplaceholder.typicode.com";

export default class PostService{

    /**
     * Get list of posts
     * @returns {Promise<AxiosResponse<any>>}
     */
    static async list(limit = null){
        let call = await axios.get(`${baseUrl}/posts`);
        return limit !== null ? call.data.slice(0, limit) : call.data;
    }

    /**
     * Create post
     * @param data
     * @returns {Promise<AxiosResponse<any>>}
     */
    static async create(data){
        return await axios.post(`${baseUrl}/posts`, data);
    }

    /**
     * Details of post
     * @param id
     * @returns {Promise<AxiosResponse<any>>}
     */
    static async details(id){
        return await axios.get(`${baseUrl}/posts/${id}`);
    }

    /**
     * Update post
     * @param id
     * @param data
     * @returns {Promise<AxiosResponse<any>>}
     */
    static async update(id, data){
        return await axios.put(`${baseUrl}/posts/${id}`, data);
    }
    static async delete(id){
        return await axios.delete(`${baseUrl}/posts/${id}`);
    }
}

