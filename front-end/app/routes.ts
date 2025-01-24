import { type RouteConfig, index, route } from "@react-router/dev/routes";

export default [
  index("routes/home.tsx"),

  route("/place/:id", "routes/place.tsx")

] satisfies RouteConfig;
