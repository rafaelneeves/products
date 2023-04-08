import { createWebHistory, createRouter } from "vue-router";

const routes = [
  {
    path: "/add",
    name: "add",
    component: () => import("./components/AddProduct.vue")
  },

  {
    path: "/products",
    name: "products",
    component: () => import("./components/ListProduct.vue")
  },

  {
    path: "/edit/:id",
    name: "products-edit",
    component: () => import("./components/EditProduct.vue")
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;