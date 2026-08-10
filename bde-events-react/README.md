# BDE-Events React Frontend

Frontend React (SPA) for BDE-Events, built with Vite.

## Goal of this step

This project currently contains only the base frontend architecture:

- simple reusable components
- pages placeholders
- React Router navigation
- Axios instance configuration
- Auth context structure (without auth logic)

No business logic is implemented yet.

## Stack

- React
- Vite
- JavaScript
- React Router DOM
- Axios
- Simple CSS

## Run locally

```bash
npm install
npm run dev
```

## Environment variables

Create/update `.env` using:

```env
VITE_API_URL=http://127.0.0.1:8000/api
```

## Architecture

```text
React Frontend
	|
	| Axios
	v
Laravel REST API
	|
	v
MySQL
```

React communicates only with Laravel API over HTTP.
