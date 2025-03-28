"use client"
import InputError from "@/Components/InputError"
import { Link, useForm } from "@inertiajs/react"
import type { FormEventHandler } from "react"

declare var route: (name: string, params?: any) => string

export default function Login({
  status,
  canResetPassword,
}: {
  status?: string
  canResetPassword: boolean
}) {
  const { data, setData, post, processing, errors, reset } = useForm({
    email: "",
    password: "",
    remember: false as boolean,
  })

  const submit: FormEventHandler = (e) => {
    e.preventDefault()

    post(route("login"), {
      onFinish: () => reset("password"),
    })
  }

  return (
    <div className="min-h-screen flex flex-col md:flex-row">
      {/* Login Form Section */}
      <div className="w-full md:w-1/2 flex items-center justify-center p-8 bg-gradient-to-b from-blue-50 to-white">
        <div className="w-full max-w-md space-y-8 animate-fadeIn">
          <div className="text-center">
            <div className="mx-auto w-24 h-24 bg-teal-500 rounded-full flex items-center justify-center mb-4 shadow-lg">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                className="h-12 w-12 text-white"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path
                  strokeLinecap="round"
                  strokeLinejoin="round"
                  strokeWidth={2}
                  d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"
                />
              </svg>
            </div>
            <h2 className="text-3xl font-bold text-teal-700">Puskesmas Batusura</h2>
            <p className="mt-2 text-sm text-gray-600">Sistem Informasi Pelayanan Kesehatan Lansia dan Balita</p>
          </div>

          <form onSubmit={submit} className="mt-8 space-y-6 bg-white p-6 rounded-xl shadow-lg border border-gray-100">
            <div className="space-y-4 animate-slideUp">
              <div>
                <label htmlFor="email" className="block text-sm font-medium text-gray-700">
                  Email / Username
                </label>
                <div className="mt-1 relative">
                  <div className="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      className="h-5 w-5 text-gray-400"
                      viewBox="0 0 20 20"
                      fill="currentColor"
                    >
                      <path
                        fillRule="evenodd"
                        d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                        clipRule="evenodd"
                      />
                    </svg>
                  </div>
                  <input
                    id="email"
                    name="email"
                    type="email"
                    value={data.email}
                    onChange={(e) => setData("email", e.target.value)}
                    autoComplete="email"
                    required
                    className="appearance-none block w-full pl-10 px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-teal-500 focus:border-teal-500 transition-all duration-300 sm:text-sm"
                    placeholder="Masukkan email anda"
                  />
                </div>
                <InputError message={errors.email} className="mt-2" />
              </div>

              <div>
                <label htmlFor="password" className="block text-sm font-medium text-gray-700">
                  Password
                </label>
                <div className="mt-1 relative">
                  <div className="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      className="h-5 w-5 text-gray-400"
                      viewBox="0 0 20 20"
                      fill="currentColor"
                    >
                      <path
                        fillRule="evenodd"
                        d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                        clipRule="evenodd"
                      />
                    </svg>
                  </div>
                  <input
                    id="password"
                    name="password"
                    type="password"
                    value={data.password}
                    onChange={(e) => setData("password", e.target.value)}
                    autoComplete="current-password"
                    required
                    className="appearance-none block w-full pl-10 px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-teal-500 focus:border-teal-500 transition-all duration-300 sm:text-sm"
                    placeholder="Masukkan password anda"
                  />
                </div>
                <InputError message={errors.password} className="mt-2" />
              </div>
            </div>

            <div className="flex items-center justify-between animate-slideUp" style={{ animationDelay: "0.2s" }}>
              <div className="flex items-center">
                <input
                  id="remember-me"
                  name="remember"
                  type="checkbox"
                  checked={data.remember}
                  onChange={(e) => setData("remember", e.target.checked)}
                  className="h-4 w-4 text-teal-600 focus:ring-teal-500 border-gray-300 rounded"
                />
                <label htmlFor="remember-me" className="ml-2 block text-sm text-gray-900">
                  Ingat saya
                </label>
              </div>

              {canResetPassword && (
                <div className="text-sm">
                  <Link href={route("password.request")} className="font-medium text-teal-600 hover:text-teal-500">
                    Lupa password?
                  </Link>
                </div>
              )}
            </div>

            <div className="animate-slideUp" style={{ animationDelay: "0.4s" }}>
              <button
                type="submit"
                disabled={processing}
                className="group relative w-full flex justify-center py-2.5 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-teal-600 hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500 transition-all duration-300 transform hover:scale-105 shadow-md"
              >
                {processing ? (
                  <svg
                    className="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                  >
                    <circle
                      className="opacity-25"
                      cx="12"
                      cy="12"
                      r="10"
                      stroke="currentColor"
                      strokeWidth="4"
                    ></circle>
                    <path
                      className="opacity-75"
                      fill="currentColor"
                      d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"
                    ></path>
                  </svg>
                ) : null}
                {processing ? "Memproses..." : "Masuk"}
              </button>
            </div>
          </form>

          <div className="mt-6 text-center text-sm animate-slideUp" style={{ animationDelay: "0.6s" }}>
            <p className="text-gray-600">
              Belum memiliki akun?{" "}
              <Link href={route("register")} className="font-medium text-teal-600 hover:text-teal-500">
                Daftar sekarang
              </Link>
            </p>
          </div>
        </div>
      </div>

      {/* Image Section */}
      <div className="hidden md:block w-1/2 bg-teal-600 overflow-hidden animate-fadeIn">
        <div className="h-full w-full relative">
          <img src="/bg.jpg" alt="Pelayanan Kesehatan" className="object-cover h-full w-full animate-slowZoom" />
          <div className="absolute inset-0 bg-gradient-to-r from-teal-600/10 to-teal-800/10 flex items-center justify-center">
            <div className="text-white text-center p-8 max-w-md animate-slideRight">
              <div className="mb-6 flex justify-center">
                <div className="rounded-full bg-white/20 p-3">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    className="h-12 w-12 text-white"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      strokeLinecap="round"
                      strokeLinejoin="round"
                      strokeWidth={2}
                      d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"
                    />
                  </svg>
                </div>
              </div>
              <h1 className="text-4xl font-bold mb-4">Pelayanan Kesehatan Terpadu</h1>
              <p className="text-lg mb-6">
                Memberikan pelayanan kesehatan berkualitas untuk lansia dan balita dengan penuh perhatian dan kasih
                sayang.
              </p>
              <div className="grid grid-cols-2 gap-4 mt-8">
                <div className="bg-white/10 p-4 rounded-lg backdrop-blur-sm">
                  <h3 className="font-bold text-xl mb-2">Lansia</h3>
                  <p className="text-sm">Pemeriksaan rutin, konsultasi kesehatan, dan perawatan khusus untuk lansia</p>
                </div>
                <div className="bg-white/10 p-4 rounded-lg backdrop-blur-sm">
                  <h3 className="font-bold text-xl mb-2">Balita</h3>
                  <p className="text-sm">Imunisasi, pemantauan tumbuh kembang, dan nutrisi untuk balita</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  )
}

