import { BrowserRouter, Routes, Route } from "react-router-dom";
import Home from "./Home";
import AddProduct from "./AddProduct";

function App() {
  return (
    <>
      <BrowserRouter>
        <Routes>
          <Route path="/" element={<Home />}></Route>
          <Route path="/add-product" element={<AddProduct />}></Route>
        </Routes>
      </BrowserRouter>
    </>
  );
}

export default App;
