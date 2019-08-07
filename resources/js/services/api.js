import axios from 'axios'

const urlApi = window.location.protocol + "//" + window.location.hostname + "/"
const api = axios.create({ baseURL: urlApi })

export default api
