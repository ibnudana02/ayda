<?php

namespace App\Controllers;

use App\Models\AppModel;
use App\Models\AsetModel;
use App\Models\CabangModel;
use App\Models\FasilitasModel;
use App\Models\ImageModel;
use App\Models\JenisModel;
use App\Models\RFasilitasModel;
use App\Models\RoleModel;
use App\Models\TransactionModel;
use App\Models\UserModel;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var list<string>
     */
    protected $helpers = [];

    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
    // protected $session;

    /**
     * @return void
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.
        $this->session = \Config\Services::session();
        $this->validation = \Config\Services::validation();
        $this->m_app = new AppModel();
        $this->m_kantor = new CabangModel();
        $this->m_user = new UserModel($this->request);
        $this->m_trans = new TransactionModel($this->request);
        $this->role_m = new RoleModel($this->request);
        $this->m_aset = new AsetModel($this->request);
        $this->m_jenis = new JenisModel($this->request);
        $this->m_ref_fas = new RFasilitasModel($this->request);
        $this->m_fasilitas = new FasilitasModel();
        $this->m_image = new ImageModel();
        $this->data['app'] = $this->m_app->select('id,nama_pt,alamat_pt,nm_aplikasi,fnama_aplikasi,logo,telp_pt,email_pt,background,pic')->first();
        // $this->data['user'] = $this->m_user->select('id,name,username,user_role,image')->find($this->session->get('id'));
        $this->data['user'] = $this->m_user->select('id,name,username,user_role,image')->where('username', $this->session->get('username'))->first();

        // E.g.: $this->session = \Config\Services::session();
    }
}
