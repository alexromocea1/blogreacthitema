import axios from "axios";
const baseUrl = "https://jsonplaceholder.typicode.com";

export default class UserService{

    /**
     * Get list of users
     * @returns {Promise<AxiosResponse<any>>}
     */
    static async list(limit = null){
        let call = await axios.get(`${baseUrl}/users`);
        return limit !== null ? call.data.slice(0, limit) : call.data;
    }

    /**
     * Create user
     * @param data
     * @returns {Promise<AxiosResponse<any>>}
     */
    static async create(data){
        return await axios.post(`${baseUrl}/users`, data);
    }

    /**
     * Details of user
     * @param id
     * @returns {Promise<AxiosResponse<any>>}
     */
    static async details(id){
        return await axios.get(`${baseUrl}/users/${id}`);
    }

    /**
     * Update user
     * @param id
     * @param data
     * @returns {Promise<AxiosResponse<any>>}
     */
    static async update(id, data){
        return await axios.put(`${baseUrl}/users/${id}`, data);
    }

    static async delete(id){
        return await axios.delete(`${baseUrl}/users/${id}`);
    }
}

