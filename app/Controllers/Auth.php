<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Login',
        ];

        return view('pages/auth/login', $data);
    }

    public function authLogin()
    {

        if (
            !$this->validate([
                'email' => [
                    'rules' => 'required|regex_match[/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/]',
                    'errors' => [
                        'required' => 'Email tidak boleh kosong',
                        'regex_match' => 'Masukkan alamat email yang valid.',
                    ],
                ],
                'password' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Password tidak boleh kosong',

                    ],
                ],
                'recaptcha_response' => [
                    'rules' => 'required|verifyrecaptchaV3',
                    'errors' => [
                        'required' => 'Silahkan verify captcha',
                    ],
                ],
            ])
        ) {
            $errors = $this->validator->getErrors();
            session()->setFlashdata('validation_errors', $errors);
            return redirect()->to(base_url('/login'));
        } else {
            $email = $this->request->getVar('email');
            $password = $this->request->getVar('password');
            $account = $this->accountModel->accountVerify($email, $password);
            $accountt = $this->accountModel->where('email', $email)->first();
            if ($account) {
                if ($accountt['status'] != 'aktif') {
                    session()->setFlashdata('error', 'Akun anda dinonaktifkan, silahkan hubungi admin');
                    return redirect()->to(base_url('/login'));
                }

                if ($account['role'] === 'pelanggan') {
                    $pelanggan = $this->pelangganModel->where('id_akun', $account['id_akun'])->first();
                    $params = [
                        'id_user' => $pelanggan['id_pelanggan'],
                        'role' => $account['role'],
                        'logged' => true,
                    ];
                } elseif ($account['role'] === 'barber') {
                    $barber = $this->barberModel->where('id_akun', $account['id_akun'])->first();
                    $params = [
                        'id_user' => $barber['id_barber'],
                        'role' => $account['role'],
                        'logged' => true,
                    ];
                } else {
                    $admin = $this->adminModel->where('id_akun', $account['id_akun'])->first();
                    $params = [
                        'id_user' => $admin['id_admin'],
                        'role' => $account['role'],
                        'logged' => true,
                    ];
                }
                session()->set($params);
                return $this->redirectWithRole();
            }
            session()->setFlashdata('error', 'Username atau Password salah !!');
            return redirect()->to(base_url('/login'));
        }

    }

    public function logout()
    {

        session()->destroy();
        return redirect()->to(base_url('/'));
    }

    private function redirectWithRole()
    {
        $level = session('role');
        if ($level == 'admin') {
            return redirect()->to(base_url('/admin'));
        } elseif ($level == 'barber') {
            return redirect()->to(base_url('/pegawai'));
        } elseif ($level == 'pelanggan') {
            return redirect()->to(base_url('/'));
        }

    }

    public function register()
    {
        session()->set('auth', true);
        $data = [
            'title' => 'Register',
        ];
        return view('pages/auth/register', $data);

    }

    public function registerUser()
    {

        $input = $this->request->getVar();

        if (
            !$this->validate([
                'name' => [
                    'rules' => 'required|regex_match[/^[a-zA-Z\s]+$/]|max_length[20]',
                    'errors' => [
                        'required' => 'Nama tidak boleh kosong',
                        'regex_match' => 'Nama hanya boleh terdiri dari huruf.',
                        'max_length' => 'Nama maksimal 20 karakter',
                    ],
                ],
                'no_hp' => [
                    'rules' => 'required|regex_match[/^08\d+$/]|min_length[12]|is_unique[akun.no_hp]',
                    'errors' => [
                        'required' => 'No whatsapp tidak boleh kosong',
                        'regex_match' => 'Masukkan no whatsapp yang valid.',
                        'min_length' => 'No whatsapp minimal 12 karakter.',
                        'is_unique' => 'No whatsapp sudah terdaftar',
                    ],
                ],
                'email' => [
                    'rules' => 'required|regex_match[/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/]|is_unique[akun.email]',
                    'errors' => [
                        'required' => 'Email tidak boleh kosong',
                        'regex_match' => 'Masukkan alamat email yang valid.',
                        'is_unique' => 'Email sudah terdaftar',
                    ],
                ],
                'password' => [
                    'rules' => 'required|regex_match[/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*()_+-={}|;:,.?<>])/]|min_length[8]|matches[repassword]',
                    'errors' => [
                        'required' => 'Password wajib diisi',
                        'regex_match' => 'Password harus terdiri dari huruf besar, kecil, simbol dan angka',
                        'min_length' => 'Password Harus memiliki 8 karakter.',
                        'matches' => 'Password harus dan repassword harus sama',
                    ],
                ],
                'recaptcha_response' => [
                    'rules' => 'required|verifyrecaptchaV3',
                    'errors' => [
                        'required' => 'Silahkan verify captcha',
                    ],
                ],
            ])
        ) {
            $error = $this->validator->getErrors();
            $data = [
                'title' => 'Register',
                'error' => $error,
                'input' => $input,

            ];
            return view('pages/auth/register', $data);
        } else {
            $account = [
                'email' => $input['email'],
                'no_hp' => $input['no_hp'],
                'password' => password_hash($input['password'], PASSWORD_BCRYPT),
                'status' => 'aktif',
                'role' => 'pelanggan',
            ];

            $this->accountModel->save($account);

            $akun = $this->accountModel->where('email', $input['email'])->first();
            $user = [
                'nama' => $input['name'],
                'id_akun' => $akun['id_akun'],
            ];
            $this->pelangganModel->save($user);
            $user = $this->pelangganModel->where('id_akun', $akun['id_akun'])->first();
            session()->set('auth', true);
            session()->setFlashData('success', true);
            return redirect()->to(base_url('/success'));

        }
        return redirect()->to(base_url('/register'));

    }

    public function otp()
    {

        $otpSended = session()->get('otp');
        $otp = $this->request->getVar('otp');

        $data = [
            'title' => 'Otp',
        ];

        if ($otp != '') {
            if ($otp == $otpSended) {
                session()->set('credential', true);
                return redirect()->to(base_url('/new-password'));
            } elseif (time() > session()->get('otp_expiration')) {
                session()->setFlashdata('error', 'Kode OTP telah kadaluarsa');
            } else {
                session()->setFlashdata('error', 'Kode otp salah');
            }
        }
        return view('pages/auth/otp', $data);

    }

    public function success()
    {
        $data = [
            'title' => 'Otp',
        ];
        return view('pages/auth/success', $data);
    }

    public function forgetPassword()
    {
        session()->set('auth', true);
        $data = [
            'title' => 'forget-password',
        ];
        return view('pages/auth/forget-password', $data);
    }

    public function whatsappAuth()
    {
        session()->set('auth', true);
        $data = [
            'title' => 'whatsapp-auth',
        ];
        return view('pages/auth/whatsapp-auth', $data);
    }

    public function newPassword()
    {
        $data = [
            'title' => 'new-password',
        ];
        return view('pages/auth/new-password', $data);
    }

    public function savePassword()
    {
        if (session()->get('credential')) {
            $password = $this->request->getVar('password');
            $confirmpassword = $this->request->getVar('confirm-password');
            if ($password != $confirmpassword) {
                session()->setFlashdata('error', 'Password harus sama');
                return redirect()->to(base_url('/new-password'));
            }
            $validationRules = [
                'password' => [
                    'rules' => 'required|regex_match[/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*()_+-={}|;:,.?<>])/]|min_length[8]',
                    'errors' => [
                        'required' => 'Password wajib diisi',
                        'regex_match' => 'Password harus terdiri dari huruf besar dan kecil, simbol dan angka',
                        'min_length' => 'Password Harus memiliki 8 karakter.',
                    ],
                ],
            ];
            if (!$this->validate($validationRules)) {
                $errors = $this->validator->getErrors();
                session()->setFlashdata('validation_errors', $errors);
                return redirect()->to(base_url('/new-password'));
            } else {
                $id_akun = session()->get('id_akun');
                $data = [
                    'password' => password_hash($password, PASSWORD_BCRYPT),
                ];
                $this->accountModel->update($id_akun, $data);
                return redirect()->to(base_url('/success'));
                session()->destroy();
            }
        } else {
            session()->setFlashdata('error', 'Akses tidak diperbolehkan');
            return redirect()->to(base_url('/login'));
        }

    }

    public function verifyForgetPassword()
    {
        if (
            !$this->validate([
                'email' => [
                    'rules' => 'required|regex_match[/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/]',
                    'errors' => [
                        'required' => 'Email tidak boleh kosong',
                        'regex_match' => 'Masukkan alamat email yang valid.',
                    ],
                ],
                'recaptcha_response' => [
                    'rules' => 'required|verifyrecaptchaV3',
                    'errors' => [
                        'required' => 'Silahkan verify captcha',
                    ],
                ],
            ])
        ) {
            $errors = $this->validator->getErrors();
            session()->setFlashdata('validation_errors', $errors);
            return redirect()->to(base_url('/forget-password'));
        } else {
            $email = $this->request->getVar('email');
            $account = $this->accountModel->where('email', $email)->first();
            if (!$account) {
                session()->setFlashdata('error', 'Email tidak terdaftar');

                return redirect()->to(base_url('/forget-password'));
            }
            if ($this->sendOtp($account['email'])) {
                session()->set('id_akun', $account['id_akun']);
                session()->set('verifyMethod', 'email');
                return redirect()->to(base_url('/otp'));
            } else {
                return redirect()->to(base_url('/forget-password'));
            }
        }
    }

    public function verifyWhatsappAuth()
    {
        if (
            !$this->validate([
                'whatsapp' => [
                    'rules' => 'regex_match[/^08\d+$/]|min_length[12]',
                    'errors' => [
                        'regex_match' => 'Masukkan no whatsapp yang valid.',
                        'min_length' => 'No whatsapp minimal 12 karakter.',
                    ],
                ],
                'recaptcha_response' => [
                    'rules' => 'required|verifyrecaptchaV3',
                    'errors' => [
                        'required' => 'Silahkan verify captcha',
                    ],
                ],
            ])
        ) {
            $errors = $this->validator->getErrors();
            session()->setFlashdata('validation_errors', $errors);
            return redirect()->to(base_url('/whatsapp-auth'));
        } else {
            $whatsapp = $this->request->getVar('whatsapp');
            $account = $this->accountModel->where('no_hp', $whatsapp)->first();
            if (!$account) {
                session()->setFlashdata('error', 'Whatsapp tidak terdaftar');
                return redirect()->to(base_url('/whatsapp-auth'));
            }
            if ($this->sendWhatsapp($whatsapp)) {
                session()->set('id_akun', $account['id_akun']);
                session()->set('verifyMethod', 'whatsapp');
                return redirect()->to(base_url('/otp'));
            } else {
                return redirect()->to(base_url('/whatsapp-auth'));
            }
        }
    }

    public function reSendOtp()
    {
        $id_akun = session()->get('id_akun');
        $account = $this->accountModel->find($id_akun);
        if (session()->get('verifyMethod') === 'email') {
            $this->sendOtp($account['email']);
        } else {
            $this->sendWhatsapp($account['no_hp']);
        }
        return redirect()->to(base_url('/otp'));
    }

    public function sendOtp($param)
    {
        // Buat kode OTP
        $otp = rand(100000, 999999);
        // 5 menit dalam detik
        // Kirim kode OTP ke alamat email pengguna
        // Buat instance object
        $mail = service('email');
        $mail->setTo($param);
        $mail->setFrom('Al-azhar.com', 'Lupa password');
        $mail->setSubject('Kode OTP untuk ganti password');
        $mail->setMessage($otp);
        if ($mail->send()) {
            session()->set('otp', $otp);
            $expiration_time = time() + 120;
            session()->set('otp_expiration', $expiration_time);
            return true;
        } else {
            $data = $mail->printDebugger(['headers']);
            session()->setFlashdata('error', 'server bermasalah silahkan coba lagi..!!');
            return false;
        }
        // Panggil metode send() dari instance
    }

    public function sendWhatsapp($param)
    {
        $otp = rand(100000, 999999);
        session()->set('otp', $otp);
        $curl = curl_init();
        curl_setopt_array(
            $curl,
            array(
                CURLOPT_URL => 'https://api.fonnte.com/send',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => array(
                    'target' => $param,
                    'message' => 'Kode Otp anda untuk melakukan reset sandi adalah ' . $otp,
                    'countryCode' => '62', //optional
                ),
                CURLOPT_HTTPHEADER => array(
                    'Authorization: W4KF9kVXHsRVNTqa@Qqe', //change TOKEN to your actual token
                ),
            )
        );
        $response = curl_exec($curl);
        curl_close($curl);
        $responseArray = json_decode($response, true);

        $status = $responseArray['status'];
        if ($status) {
            session()->set('otp', $otp);
            $expiration_time = time() + 120;
            session()->set('otp_expiration', $expiration_time);
            return true;
        } else {
            session()->setFlashdata('error', 'server bermasalah silahkan coba lagi..!!');
            return false;
        }
    }

}