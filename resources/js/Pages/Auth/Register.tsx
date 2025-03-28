import { Head, Link, useForm } from '@inertiajs/react';
import { FormEventHandler } from 'react';
import InputError from '@/Components/InputError';

declare var route: (name: string, params?: any) => string;

export default function Register() {
    const { data, setData, post, processing, errors, reset } = useForm({
        name: '',
        email: '',
        phone: '',
        date_of_birth: '',
        gender: '',
        address: '',
        password: '',
        password_confirmation: '',
        terms: false,
    });

    const submit: FormEventHandler = (e) => {
        e.preventDefault();

        post(route('register'));
    };

    return (
        <div className="min-h-screen flex flex-col md:flex-row">
            {/* Registration Form Section */}
            <div className="w-full md:w-1/2 flex items-center justify-center p-8 bg-gradient-to-b from-blue-50 to-white overflow-auto">
                <div className="w-full max-w-md space-y-6 animate-fadeIn py-8">
                    <div className="text-center">
                        <div className="mx-auto w-24 h-24 bg-teal-500 rounded-full flex items-center justify-center mb-4 shadow-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" className="h-12 w-12 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                            </svg>
                        </div>
                        <h2 className="text-3xl font-bold text-teal-700">Puskesmas Batusura</h2>
                        <p className="mt-2 text-sm text-gray-600">Pendaftaran Sistem Informasi Pelayanan Kesehatan</p>
                    </div>

                    <form onSubmit={submit} className="mt-8 space-y-5 bg-white p-6 rounded-xl shadow-lg border border-gray-100">
                        <div className="space-y-4 animate-slideUp">
                            {/* Name Field */}
                            <div>
                                <label htmlFor="name" className="block text-sm font-medium text-gray-700">
                                    Nama Lengkap
                                </label>
                                <div className="mt-1 relative">
                                    <div className="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" className="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path fillRule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clipRule="evenodd" />
                                        </svg>
                                    </div>
                                    <input
                                        id="name"
                                        name="name"
                                        type="text"
                                        value={data.name}
                                        onChange={(e) => setData('name', e.target.value)}
                                        required
                                        className="appearance-none block w-full pl-10 px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-teal-500 focus:border-teal-500 transition-all duration-300 sm:text-sm"
                                        placeholder="Masukkan nama lengkap anda"
                                    />
                                </div>
                                <InputError message={errors.name} className="mt-2" />
                            </div>

                            {/* Email Field */}
                            <div>
                                <label htmlFor="email" className="block text-sm font-medium text-gray-700">
                                    Email
                                </label>
                                <div className="mt-1 relative">
                                    <div className="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" className="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                        </svg>
                                    </div>
                                    <input
                                        id="email"
                                        name="email"
                                        type="email"
                                        value={data.email}
                                        onChange={(e) => setData('email', e.target.value)}
                                        required
                                        className="appearance-none block w-full pl-10 px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-teal-500 focus:border-teal-500 transition-all duration-300 sm:text-sm"
                                        placeholder="Masukkan email anda"
                                    />
                                </div>
                                <InputError message={errors.email} className="mt-2" />
                            </div>

                            {/* Phone Field */}
                            {/* <div className=''>
                                <label htmlFor="phone" className="block text-sm font-medium text-gray-700">
                                    Nomor Telepon
                                </label>
                                <div className="mt-1 relative">
                                    <div className="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" className="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                                        </svg>
                                    </div>
                                    <input
                                        id="phone"
                                        name="phone"
                                        type="tel"
                                        value={data.phone}
                                        onChange={(e) => setData('phone', e.target.value)}
                                        required
                                        className="appearance-none block w-full pl-10 px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-teal-500 focus:border-teal-500 transition-all duration-300 sm:text-sm"
                                        placeholder="Masukkan nomor telepon anda"
                                    />
                                </div>
                                <InputError message={errors.phone} className="mt-2" />
                            </div> */}

                            {/* Date of Birth Field */}
                            {/* <div className=''>
                                <label htmlFor="date_of_birth" className="block text-sm font-medium text-gray-700">
                                    Tanggal Lahir
                                </label>
                                <div className="mt-1 relative">
                                    <div className="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" className="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path fillRule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clipRule="evenodd" />
                                        </svg>
                                    </div>
                                    <input
                                        id="date_of_birth"
                                        name="date_of_birth"
                                        type="date"
                                        value={data.date_of_birth}
                                        onChange={(e) => setData('date_of_birth', e.target.value)}
                                        required
                                        className="appearance-none block w-full pl-10 px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-teal-500 focus:border-teal-500 transition-all duration-300 sm:text-sm"
                                    />
                                </div>
                                <InputError message={errors.date_of_birth} className="mt-2" />
                            </div> */}

                            {/* Gender Field */}
                            {/* <div className=''>
                                <label htmlFor="gender" className="block text-sm font-medium text-gray-700">
                                    Jenis Kelamin
                                </label>
                                <div className="mt-1 relative">
                                    <div className="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" className="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path fillRule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clipRule="evenodd" />
                                        </svg>
                                    </div>
                                    <select
                                        id="gender"
                                        name="gender"
                                        value={data.gender}
                                        onChange={(e) => setData('gender', e.target.value)}
                                        required
                                        className="appearance-none block w-full pl-10 px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-teal-500 focus:border-teal-500 transition-all duration-300 sm:text-sm"
                                    >
                                        <option value="">Pilih jenis kelamin</option>
                                        <option value="male">Laki-laki</option>
                                        <option value="female">Perempuan</option>
                                    </select>
                                </div>
                                <InputError message={errors.gender} className="mt-2" />
                            </div> */}

                            {/* Address Field */}
                            {/* <div className=''>
                                <label htmlFor="address" className="block text-sm font-medium text-gray-700">
                                    Alamat
                                </label>
                                <div className="mt-1 relative">
                                    <div className="absolute top-3 left-0 pl-3 flex items-start pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" className="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path fillRule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clipRule="evenodd" />
                                        </svg>
                                    </div>
                                    <textarea
                                        id="address"
                                        name="address"
                                        value={data.address}
                                        onChange={(e) => setData('address', e.target.value)}
                                        rows={3}
                                        className="appearance-none block w-full pl-10 px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-teal-500 focus:border-teal-500 transition-all duration-300 sm:text-sm"
                                        placeholder="Masukkan alamat lengkap anda"
                                    />
                                </div>
                                <InputError message={errors.address} className="mt-2" />
                            </div> */}

                            {/* Password Field */}
                            <div>
                                <label htmlFor="password" className="block text-sm font-medium text-gray-700">
                                    Password
                                </label>
                                <div className="mt-1 relative">
                                    <div className="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" className="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path fillRule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clipRule="evenodd" />
                                        </svg>
                                    </div>
                                    <input
                                        id="password"
                                        name="password"
                                        type="password"
                                        value={data.password}
                                        onChange={(e) => setData('password', e.target.value)}
                                        required
                                        className="appearance-none block w-full pl-10 px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-teal-500 focus:border-teal-500 transition-all duration-300 sm:text-sm"
                                        placeholder="Masukkan password anda"
                                    />
                                </div>
                                <InputError message={errors.password} className="mt-2" />
                            </div>

                            {/* Password Confirmation Field */}
                            <div>
                                <label htmlFor="password_confirmation" className="block text-sm font-medium text-gray-700">
                                    Konfirmasi Password
                                </label>
                                <div className="mt-1 relative">
                                    <div className="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" className="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path fillRule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clipRule="evenodd" />
                                        </svg>
                                    </div>
                                    <input
                                        id="password_confirmation"
                                        name="password_confirmation"
                                        type="password"
                                        value={data.password_confirmation}
                                        onChange={(e) => setData('password_confirmation', e.target.value)}
                                        required
                                        className="appearance-none block w-full pl-10 px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-teal-500 focus:border-teal-500 transition-all duration-300 sm:text-sm"
                                        placeholder="Konfirmasi password anda"
                                    />
                                </div>
                                <InputError message={errors.password_confirmation} className="mt-2" />
                            </div>
                        </div>

                        {/* Terms and Conditions */}
                        <div className="flex items-center animate-slideUp" style={{ animationDelay: "0.2s" }}>
                            <input
                                id="terms"
                                name="terms"
                                type="checkbox"
                                checked={data.terms}
                                onChange={(e:any) => setData('terms', e.target.checked)}
                                className="h-4 w-4 text-teal-600 focus:ring-teal-500 border-gray-300 rounded"
                                required
                            />
                            <label htmlFor="terms" className="ml-2 block text-sm text-gray-900">
                                Saya menyetujui <a href="#" className="text-teal-600 hover:text-teal-500">syarat dan ketentuan</a> yang berlaku
                            </label>
                            <InputError message={errors.terms} className="mt-2" />
                        </div>

                        {/* Submit Button */}
                        <div className="animate-slideUp" style={{ animationDelay: "0.4s" }}>
                            <button
                                type="submit"
                                disabled={processing}
                                className="group relative w-full flex justify-center py-2.5 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-teal-600 hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500 transition-all duration-300 transform hover:scale-105 shadow-md"
                            >
                                {processing ? (
                                    <svg className="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle className="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" strokeWidth="4"></circle>
                                        <path className="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                ) : null}
                                {processing ? 'Memproses...' : 'Daftar'}
                            </button>
                        </div>
                    </form>

                    <div className="mt-6 text-center text-sm animate-slideUp" style={{ animationDelay: "0.6s" }}>
                        <p className="text-gray-600">
                            Sudah memiliki akun?{" "}
                            <Link href={route('login')} className="font-medium text-teal-600 hover:text-teal-500">
                                Masuk sekarang
                            </Link>
                        </p>
                    </div>
                </div>
            </div>

            {/* Image Section */}
            <div className="hidden md:block w-1/2 bg-teal-600 overflow-hidden animate-fadeIn">
                <div className="h-full w-full relative">
                    <img
                        src="/bg.jpg"
                        alt="Pelayanan Kesehatan"
                        className="object-cover h-full w-full animate-slowZoom"
                    />
                    <div className="absolute inset-0 bg-gradient-to-r from-teal-600/30 to-teal-800/20 flex items-center justify-center">
                        <div className="text-white text-center p-8 max-w-md animate-slideRight">
                            <div className="mb-6 flex justify-center">
                                <div className="rounded-full bg-white/20 p-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" className="h-12 w-12 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                    </svg>
                                </div>
                            </div>
                            <h1 className="text-4xl font-bold mb-4">Bergabunglah Dengan Kami</h1>
                            <p className="text-lg mb-6">
                                Daftar sekarang untuk mendapatkan akses ke layanan kesehatan terbaik untuk lansia dan balita di Puskesmas Batusura.
                            </p>
                            <div className="grid grid-cols-1 gap-4 mt-8">
                                <div className="bg-white/10 p-4 rounded-lg backdrop-blur-sm">
                                    <h3 className="font-bold text-xl mb-2">Keuntungan Mendaftar</h3>
                                    <ul className="text-sm space-y-2 text-left list-disc pl-5">
                                        <li>Akses mudah ke jadwal pemeriksaan kesehatan</li>
                                        <li>Pengingat imunisasi dan pemeriksaan rutin</li>
                                        <li>Konsultasi online dengan tenaga medis</li>
                                        <li>Akses ke riwayat kesehatan digital</li>
                                        <li>Informasi program kesehatan terbaru</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
}
