const create = async (data) => {
  try {
    await fetch("../api/create.php", {
      method: "POST",
      body: JSON.stringify(data),
    });
  } catch (error) {
    console.error("Error creating todo.");
  }
};

export default { create };
