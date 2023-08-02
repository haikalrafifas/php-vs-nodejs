const express = require('express');
const path = require('path');

const app = express();
const port = 80;

app.use(express.static(path.join(__dirname, '../frontend')));

app.get("/api/test", (req, res) => {
	res.status(200).json({ message: "test" });
});

app.get("/api/*", (req, res) => {
    res.status(200).json({ error: `Cannot GET ${req.path}` });
});

app.listen(port, () => {
  console.log(`Server is running on http://localhost:${port}`);
});
