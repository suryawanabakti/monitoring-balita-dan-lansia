import ApplicationLogo from "@/Components/ApplicationLogo"
import { Link, usePage } from "@inertiajs/react"
import type { PropsWithChildren } from "react"

export default function Guest({ children }: PropsWithChildren) {
  const { url } = usePage().props

  return (
    <div className="min-h-screen flex bg-gradient-to-br from-gray-50 to-gray-100">
      {/* Left side - Login Form */}
      <div className="w-full lg:w-1/2 flex flex-col items-center justify-center p-8 lg:p-12">
        <div className="w-full max-w-md">
          <div className="text-center mb-8 animate-fadeIn">
            <Link href="/" className="inline-block">
              <ApplicationLogo className="h-20 w-20 fill-current text-primary transition-all duration-300 hover:scale-105" />
            </Link>
            <h2 className="mt-6 text-3xl font-bold text-gray-900">Welcome Back</h2>
            <p className="mt-2 text-sm text-gray-600">Sign in to your account to continue</p>
          </div>

          <div className="w-full bg-white rounded-xl shadow-lg overflow-hidden animate-slideUp">
            <div className="p-8">{children}</div>
          </div>

          <div className="mt-8 text-center text-sm text-gray-600 animate-slideUp" style={{ animationDelay: "0.3s" }}>
            <p>
              Don't have an account?{" "}
              <Link
                href={route("register")}
                className="font-medium text-primary hover:text-primary/80 transition-colors"
              >
                Sign up
              </Link>
            </p>
          </div>
        </div>
      </div>

      {/* Right side - Beautiful Gradient Background */}
      <div className="hidden lg:block w-1/2 animate-fadeIn">
        <div className="h-full w-full relative bg-gradient-to-br from-primary-600 via-primary-700 to-primary-800">
          {/* Decorative elements */}
          <div className="absolute inset-0 overflow-hidden">
            <div className="absolute -top-40 -right-40 w-80 h-80 rounded-full bg-white/10 blur-xl"></div>
            <div className="absolute top-1/4 -left-20 w-60 h-60 rounded-full bg-white/10 blur-xl"></div>
            <div className="absolute bottom-1/3 right-1/4 w-40 h-40 rounded-full bg-white/10 blur-xl"></div>
          </div>

          {/* Content */}
          <div className="absolute inset-0 flex items-center justify-center">
            <div className="text-white text-center p-12 max-w-lg animate-slideRight">
              <h1 className="text-4xl font-bold mb-4">Secure Access Portal</h1>
              <p className="text-lg">Access your dashboard and manage your resources with our intuitive interface.</p>

              {/* Optional decorative icon */}
              <div className="mt-8 flex justify-center">
                <svg className="w-24 h-24 text-white/30" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm0-2a8 8 0 100-16 8 8 0 000 16zm0-3a5 5 0 110-10 5 5 0 010 10zm0-2a3 3 0 100-6 3 3 0 000 6z" />
                </svg>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  )
}

