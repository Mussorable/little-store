import Header from "./Header";
import Button from "./components/Button";
import Form from "./components/Form";
import { useNavigate } from "react-router-dom";
import { useEffect } from "react";
import { useState } from "react";

export default function AddProduct({ get, endpoint }) {
  const navigate = useNavigate();
  const [sku, setSku] = useState([]);
  const [skuInputValue, setSkuInputValue] = useState("");
  const [isSkuExist, setIsSkuExist] = useState(false);

  function handleSkuChange(e) {
    setSkuInputValue(e.target.value);
  }

  useEffect(() => {
    if (sku) {
      if (sku?.find((item) => item === skuInputValue)) {
        setIsSkuExist(true);
      } else {
        setIsSkuExist(false);
      }
    }
  }, [skuInputValue]);

  useEffect(() => {
    get(endpoint).then((object) => {
      Object.values(object).forEach((item) => {
        setSku((prevValue) => [...prevValue, item["sku"]]);
      });
    });
  }, []);

  function redirectToHome() {
    navigate("/");
  }

  return (
    <>
      <Header heading="Product Add">
        <input
          disabled={isSkuExist}
          type="submit"
          className="button"
          form="product_form"
          value="Save"
        />
        <Button className="button" onClick={redirectToHome}>
          Cancel
        </Button>
      </Header>
      <main>
        <div className="container">
          <Form
            sku={sku}
            skuInputValue={skuInputValue}
            setSkuInputValue={handleSkuChange}
          />
          {isSkuExist && <p>Product SKU already exist</p>}
        </div>
      </main>
    </>
  );
}
