import axios from "axios";

export default axios.create({
  baseURL: "http://localhost/api/products/",
  headers: {
    "Content-type": "application/json"
  }
});