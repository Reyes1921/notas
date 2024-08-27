[Volver al Menú](root.md)

# `React hook form`

React hook form is an opensource form library for react. Performant, flexible and extensible forms with easy-to-use validation.

# `Installation`

`npm install react-hook-form`

## `Example`

```
import { useForm, SubmitHandler } from "react-hook-form"


type Inputs = {
  example: string
  exampleRequired: string
}


export default function App() {
  const {
    register,
    handleSubmit,
    watch,
    formState: { errors },
  } = useForm<Inputs>()
  const onSubmit: SubmitHandler<Inputs> = (data) => console.log(data)


  console.log(watch("example")) // watch input value by passing the name of it


  return (
    /* "handleSubmit" will validate your inputs before invoking "onSubmit" */
    <form onSubmit={handleSubmit(onSubmit)}>
      {/* register your input into the hook by invoking the "register" function */}
      <input defaultValue="test" {...register("example")} />


      {/* include validation with required or other standard HTML validation rules */}
      <input {...register("exampleRequired", { required: true })} />
      {/* errors will return when field validation fails  */}
      {errors.exampleRequired && <span>This field is required</span>}


      <input type="submit" />
    </form>
  )
}
```

# `Register fields`

One of the key concepts in React Hook Form is to register your component into the hook. This will make its value available for both the form validation and submission.

```
import ReactDOM from "react-dom"
import { useForm, SubmitHandler } from "react-hook-form"


enum GenderEnum {
  female = "female",
  male = "male",
  other = "other",
}


interface IFormInput {
  firstName: string
  gender: GenderEnum
}


export default function App() {
  const { register, handleSubmit } = useForm<IFormInput>()
  const onSubmit: SubmitHandler<IFormInput> = (data) => console.log(data)


  return (
    <form onSubmit={handleSubmit(onSubmit)}>
      <label>First Name</label>
      <input {...register("firstName")} />
      <label>Gender Selection</label>
      <select {...register("gender")}>
        <option value="female">female</option>
        <option value="male">male</option>
        <option value="other">other</option>
      </select>
      <input type="submit" />
    </form>
  )
}
```

# `Apply validation`

React Hook Form makes form validation easy by aligning with the existing HTML standard for form validation.

## `List of validation rules supported:`

- `required`
- `min`
- `max`
- `minLength`
- `maxLength`
- `pattern`
- `validate`

```
import { useForm, SubmitHandler } from "react-hook-form"

interface IFormInput {
  firstName: string
  lastName: string
  age: number
}

export default function App() {
  const { register, handleSubmit } = useForm<IFormInput>()
  const onSubmit: SubmitHandler<IFormInput> = (data) => console.log(data)

  return (
    <form onSubmit={handleSubmit(onSubmit)}>
      <input {...register("firstName", { required: true, maxLength: 20 })} />
      <input {...register("lastName", { pattern: /^[A-Za-z]+$/i })} />
      <input type="number" {...register("age", { min: 18, max: 99 })} />
      <input type="submit" />
    </form>
  )
}
```

# `Handle errors`

React Hook Form provides an errors object to show you the errors in the form. errors' type will return given validation constraints. The following example showcases a required validation rule.

```
import { useForm } from "react-hook-form"


export default function App() {
  const {
    register,
    formState: { errors },
    handleSubmit,
  } = useForm()
  const onSubmit = (data) => console.log(data)


  return (
    <form onSubmit={handleSubmit(onSubmit)}>
      <input
        {...register("firstName", { required: true })}
        aria-invalid={errors.firstName ? "true" : "false"}
      />
      {errors.firstName?.type === "required" && (
        <p role="alert">First name is required</p>
      )}


      <input
        {...register("mail", { required: "Email Address is required" })}
        aria-invalid={errors.mail ? "true" : "false"}
      />
      {errors.mail && <p role="alert">{errors.mail.message}</p>}


      <input type="submit" />
    </form>
  )
}
```

# `Schema Validation`

We also support schema-based form validation with Yup, Zod , Superstruct & Joi, where you can pass your schema to useForm as an optional config. It will validate your input data against the schema and return with either errors or a valid result.

`npm install @hookform/resolvers yup`

```
import { useForm } from "react-hook-form"
import { yupResolver } from "@hookform/resolvers/yup"
import * as yup from "yup"


const schema = yup
  .object({
    firstName: yup.string().required(),
    age: yup.number().positive().integer().required(),
  })
  .required()


export default function App() {
  const {
    register,
    handleSubmit,
    formState: { errors },
  } = useForm({
    resolver: yupResolver(schema),
  })
  const onSubmit = (data) => console.log(data)


  return (
    <form onSubmit={handleSubmit(onSubmit)}>
      <input {...register("firstName")} />
      <p>{errors.firstName?.message}</p>


      <input {...register("age")} />
      <p>{errors.age?.message}</p>


      <input type="submit" />
    </form>
  )
}
```

# `TypeScript`

React Hook Form is built with TypeScript, and you can define a FormData type to support form values.

```
import * as React from "react"
import { useForm } from "react-hook-form"


type FormData = {
  firstName: string
  lastName: string
}


export default function App() {
  const {
    register,
    setValue,
    handleSubmit,
    formState: { errors },
  } = useForm<FormData>()
  const onSubmit = handleSubmit((data) => console.log(data))
  // firstName and lastName will have correct type


  return (
    <form onSubmit={onSubmit}>
      <label>First Name</label>
      <input {...register("firstName")} />
      <label>Last Name</label>
      <input {...register("lastName")} />
      <button
        type="button"
        onClick={() => {
          setValue("lastName", "luo") // ✅
          setValue("firstName", true) // ❌: true is not string
          errors.bill // ❌: property bill does not exist
        }}
      >
        SetValue
      </button>
    </form>
  )
}
```

[Mas Información](https://react-hook-form.com/)

[TOP](#react-hook-form)
