import Header from "./Header";
import Button from "./components/Button";
import ProductItem from "./components/ProductItem";
import { Link } from "react-router-dom";
import { useState } from "react";
import { useEffect } from "react";
import { useRef } from "react";
import useFetch from "./useFetch";

export default function Home() {
  const [products, setProducts] = useState();
  const [checkboxArray, setCheckboxArray] = useState([]);
  const [isDelete, setIsDelete] = useState(false);
  const formRef = useRef();
  const { get } = useFetch(
    "https://pet-hotel-375a8-default-rtdb.europe-west1.firebasedatabase.app/"
  );

  useEffect(() => {
    get("products/-NVVhgZuIOy2GK5mQ_DW.json").then((object) => {
      setProducts(Object.values(object));
    });
  }, []);

  // NEED REFACTOR
  function handleCheckboxClick(checkbox) {
    if (!checkboxArray[0]) {
      setIsDelete(false);
    }
    const inArray = checkboxArray.find(
      (checkboxID) => checkboxID === checkbox.target.id
    );
    if (checkbox.target.checked && !inArray) {
      setCheckboxArray((prevValue) => [...prevValue, checkbox.target.id]);
    }
    if (!checkbox.target.checked) {
      setCheckboxArray(
        checkboxArray.filter((checkboxID) => checkboxID !== checkbox.target.id)
      );
    }
  }

  function handleDeleteClick() {
    fetch("deleteItems.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({ data: checkboxArray }),
    })
      .then((response) => response.text())
      .then((data) => {
        console.log(data);
      })
      .catch((error) => {
        console.error(error);
      });
  }

  return (
    <>
      <Header heading="Product List">
        <Link to="/add-product" className="button">
          ADD
        </Link>
        <Button
          onClick={handleDeleteClick}
          className="button"
          id="delete-product-btn"
        >
          MASS DELETE
        </Button>
      </Header>
      <main>
        <div className="container home-display">
          {products &&
            products.map((product) => {
              return (
                <ProductItem
                  handleCheckboxClick={handleCheckboxClick}
                  key={product.id}
                  product={product}
                />
              );
            })}
        </div>
      </main>
      {isDelete && (
        <>
          <form
            ref={formRef}
            id="delete-form"
            action="deleteItems.php"
            method="POST"
          >
            {checkboxArray &&
              checkboxArray.map((checkboxID, index) => {
                return (
                  <input
                    key={checkboxID}
                    value={checkboxID}
                    type="text"
                    name={`data$[${index}]`}
                    id={checkboxID}
                    readOnly
                  />
                );
              })}
          </form>
        </>
      )}
    </>
  );
}
