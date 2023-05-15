import { useEffect } from "react";

export default function ProductItem({ product }) {
  useEffect(() => {
    console.log(product);
  }, [product]);

  return (
    <div className="product-item">
      <p>CH</p>
      <div className="describe-box">
        <p className="product-sku">{product.sku}</p>
        <h3 className="product-name">{product.name}</h3>
        <p className="product-price">{product.price}</p>
        <p>KG / MB / SIZE</p>
      </div>
    </div>
  );
}
