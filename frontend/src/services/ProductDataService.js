import http from "../http-common";

class ProductDataService {
  create(data) {
    return http.post("/create", data);
  }

  getAll() {
    return http.get("");
  }

  get(id) {
    return http.get(`/get/${id}`);
  }

  update(id, data) {
    return http.put(`/update/${id}`, data);
  }

  delete(id) {
    return http.delete(`/delete/${id}`);
  }
}

export default new ProductDataService();