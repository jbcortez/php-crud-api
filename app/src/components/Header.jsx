import React, { useState } from "react";
import Input from "./Input";
import TodoServices from "../services/todoServices";
import Button from "./Button";
import styled from "styled-components";

const Header = () => {
  const [value, setValue] = useState("");

  const addTodo = () => {
    TodoServices.create({ content: value });
  };

  return (
    <Container>
      <Input
        value={value}
        onChange={(e) => setValue(e.target.value)}
        style={{ marginRight: "1rem" }}
      />
      <Button onClick={addTodo}>Add</Button>
    </Container>
  );
};

export default Header;

const Container = styled.div`
  padding: 2rem;
  display: flex;
`;
