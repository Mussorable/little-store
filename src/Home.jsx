import Header from "./Header";
import Button from "./components/Button";
import ProductItem from "./components/ProductItem";
import { Link } from "react-router-dom";

export default function Home() {
  return (
    <>
      <Header heading="Product List">
        <Link to="/add-product" className="button">
          ADD
        </Link>
        <Button className="button">MASS DELETE</Button>
      </Header>
      <main>
        <div className="container home-display">
          <ProductItem></ProductItem>
          <ProductItem></ProductItem>
          <ProductItem></ProductItem>
          <ProductItem></ProductItem>
        </div>
      </main>
    </>
  );
}
