import Header from "./Header";
import Button from "./components/Button";
import ProductItem from "./components/ProductItem";
import { Link } from "react-router-dom";
import { useState } from "react";
import { useEffect } from "react";
import useFetch from "./useFetch";

export default function Home() {
  const [products, setProducts] = useState();
  const { get } = useFetch(
    "https://pet-hotel-375a8-default-rtdb.europe-west1.firebasedatabase.app/"
  );

  useEffect(() => {
    get("products.json").then((object) => {
      Object.values(object).forEach((item) => setProducts(item));
    });
  }, []);

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
          {/* <ProductItem products={products}></ProductItem>
          <ProductItem products={products}></ProductItem>
          <ProductItem products={products}></ProductItem>
          <ProductItem products={products}></ProductItem> */}
          {products &&
            products.map((product, index) => {
              return <ProductItem key={index} product={product} />;
            })}
        </div>
      </main>
    </>
  );
}
