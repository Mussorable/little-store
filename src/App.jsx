import { BrowserRouter, Routes, Route } from "react-router-dom";
import useFetch from "./useFetch";
import Home from "./Home";
import AddProduct from "./AddProduct";

function App() {
  const { get } = useFetch(
    "https://pet-hotel-375a8-default-rtdb.europe-west1.firebasedatabase.app/"
  );
  const endpoint = "products.json";

  return (
    <>
      <BrowserRouter>
        <Routes>
          <Route
            path="/"
            element={<Home get={get} endpoint={endpoint} />}
          ></Route>
          <Route
            path="/add-product"
            element={<AddProduct get={get} endpoint={endpoint} />}
          ></Route>
        </Routes>
      </BrowserRouter>
    </>
  );
}

export default App;
