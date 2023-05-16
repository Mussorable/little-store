import { useEffect } from "react";
import Checkbox from "./Checkbox";

export default function ProductItem({ product, handleCheckboxClick }) {
  return (
    <div className="product-item">
      <Checkbox
        handleCheckboxClick={handleCheckboxClick}
        id={product.id}
      ></Checkbox>
      <div className="describe-box">
        <p className="product-sku">{product.sku}</p>
        <h3 className="product-name">{product.name}</h3>
        <p className="product-price">{product.price}</p>
        <p>{product.arg}</p>
      </div>
    </div>
  );
}
