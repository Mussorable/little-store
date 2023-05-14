import Header from "./Header";
import Button from "./components/Button";
import Form from "./components/Form";
import { useNavigate } from "react-router-dom";

export default function AddProduct() {
  const navigate = useNavigate();

  function redirectToHome() {
    navigate("/");
  }

  function handleFormSubmit(e) {
    // redirectToHome();
  }

  return (
    <>
      <Header heading="Product Add">
        <input
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
          <Form handleFormSubmit={handleFormSubmit} />
        </div>
      </main>
    </>
  );
}
