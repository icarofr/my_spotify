const App = () => {
  return React.createElement(
    "div",
    {class: "avenir"},
    React.createElement("div", { class: "bg-green pv5 tc white" }, [
      React.createElement("div", { class: "f1" }, "Stupefy!"),
      React.createElement(
        "div",
        { class: "f5" },
        "Magically iterating through all your favorite artists."
      )
    ])
  );
};
ReactDOM.render(React.createElement(App), document.getElementById("root"));
