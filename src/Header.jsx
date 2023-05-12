export default function Header({ children, heading }) {
  return (
    <header>
      <div className="container header">
        <h1>{heading}</h1>
        <div className="main-buttons-box">{children}</div>
      </div>
    </header>
  );
}
