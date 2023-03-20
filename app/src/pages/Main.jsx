import React from "react";
import styled from "styled-components";
import Header from "../components/Header";

const Main = () => {
  return (
    <Container>
      <Header />
    </Container>
  );
};

export default Main;

const Container = styled.div`
  display: flex;
  flex-direction: column;
`;
