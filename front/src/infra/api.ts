import {Axios} from "axios";

const api = new Axios({
    headers: {
        'Accept': 'application/json',
        'Content-Type': 'application/json'
    }
})

export default api;