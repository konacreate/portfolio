document.addEventListener('DOMContentLoaded', () => {
  // 定義
  const drawerIcon = document.querySelector('.p-drawer__icon');
  const drawerClose = document.querySelector('.p-drawer__close');
  const drawer = document.querySelector('.p-drawer');
  const drawerNavItem = document.querySelectorAll(
    '.p-drawer__body a[href^="#"]',
  );
  const headerHeight = document.querySelector('.p-header').offsetHeight;
  const breakpoint = 768;
  let isMenuOpen = false;
  let isMenuOpenAtBreakpoint = false;
  const mainContent = document.querySelector('main'); // メインコンテンツなど、背景の要素
  const footerContent = document.querySelector('footer');
  const headerContent = document.querySelector('header');
  const iconX = document.querySelector('.p-cta');

  const focusableElements = [mainContent, footerContent, headerContent, iconX];

  // メニューを開く
  const openMenu = () => {
    if (!drawer.classList.contains('js-show')) {
      drawer.classList.add('js-show');
      isMenuOpen = true; // メニューが開いたことを示す

      // 100ms遅延させて `inert` を適用
      setTimeout(() => {
        focusableElements.forEach((element) => {
          element.setAttribute('inert', '');
          element.setAttribute('tabindex', '-1'); // キーボードフォーカスを防ぐ
        });
      }, 100);
    }
  };

  // メニューを閉じる
  const closeMenu = () => {
    if (drawer.classList.contains('js-show')) {
      drawer.classList.remove('js-show');
      isMenuOpen = false; // メニューが閉じたことを示す

      // 400ms（アニメーション完了後）に `inert` を解除
      setTimeout(() => {
        focusableElements.forEach((element) => {
          element.removeAttribute('inert');
          element.removeAttribute('tabindex');
        });
      }, 400);
    }
  };

  // メニュー外クリックで閉じる処理
  const clickOuter = (event) => {
    if (
      isMenuOpen &&
      !drawer.contains(event.target) &&
      !drawerIcon.contains(event.target)
    ) {
      closeMenu();
    }
  };

  // リサイズ処理
  const handleResize = () => {
    const windowWidth = window.innerWidth;
    if (windowWidth > breakpoint && isMenuOpenAtBreakpoint) {
      closeMenu();
    } else if (
      windowWidth <= breakpoint &&
      drawer.classList.contains('js-show')
    ) {
      isMenuOpenAtBreakpoint = true;
    }
  };

  // 該当箇所までスクロール
  const linkScroll = (target) => {
    if (target) {
      const targetPosition =
        target.getBoundingClientRect().top + window.scrollY;
      const offsetPosition = targetPosition - headerHeight;
      window.scrollTo({
        top: offsetPosition,
        behavior: 'smooth',
      });
    }
  };

  // ヘッダーアイコン クリック時
  drawerIcon.addEventListener('click', openMenu);
  drawerClose.addEventListener('click', closeMenu);
  // 画面幅リサイズ時
  window.addEventListener('resize', handleResize);
  // メニュー外クリック時
  document.addEventListener('click', clickOuter);
  // ページ内リンクナビメニュー クリック時
  drawerNavItem.forEach((item) => {
    item.addEventListener('click', (event) => {
      event.preventDefault();
      closeMenu();
      const targetItem = document.querySelector(item.getAttribute('href'));
      linkScroll(targetItem);
    });
  });
});

// fvSwiper
if (document.querySelector('#js-fv-swiper')) {
  const fvSwiper = new Swiper('#js-fv-swiper', {
    // Optional parameters
    loop: true,
    effect: 'fade',
    fadeEffect: {
      crossFade: true,
    },
    speed: 2000,
    autoplay: {
      delay: 4000,
    },
  });
}

// worksSwiper
if (document.querySelector('#js-works-swiper')) {
  const worksSwiper = new Swiper('#js-works-swiper', {
    // Optional parameters
    spaceBetween: 7,
    slidesPerView: 'auto',
    watchSlidesProgress: true,
    rewind: true,

    // If we need pagination
    pagination: {
      el: '.p-works-swiper__pagination',
    },

    // Navigation arrows
    navigation: {
      nextEl: '.p-works-swiper__next',
      prevEl: '.p-works-swiper__prev',
    },
  });
}

// ヘッダーの高さを考慮したリンクのスムーススクロール
document.addEventListener('DOMContentLoaded', function () {
  const links = document.querySelectorAll('a[href^="#"], a[href*="#"]');

  function scrollToTarget(targetId) {
    if (!targetId || targetId === '#') return;

    const target = document.querySelector(targetId);
    if (target) {
      const header = document.querySelector('.p-header__wrapper');
      const headerOffset = header ? header.offsetHeight : 0;
      const elementPosition =
        target.getBoundingClientRect().top + window.scrollY;
      const offsetPosition = elementPosition - headerOffset;

      window.scrollTo({
        top: offsetPosition,
        behavior: 'smooth',
      });
    }
  }

  // クリックイベント
  links.forEach((item) => {
    item.addEventListener('click', (event) => {
      const href = item.getAttribute('href');

      // 別ページへのリンクの場合は処理をスキップ
      if (href.startsWith('http') && !href.includes(window.location.hostname))
        return;

      // 同じページ内のアンカーリンクなら処理
      if (href.startsWith('#')) {
        event.preventDefault();
        scrollToTarget(href);
      }
    });
  });

  // **ページ遷移後の処理（ヘッダーの高さを考慮）**
  if (window.location.hash) {
    setTimeout(() => {
      scrollToTarget(window.location.hash);
    }, 0); // ページの読み込み後に少し遅らせてスクロール
  }
});

document.addEventListener('DOMContentLoaded', function () {
  const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

  function showError(field, message) {
    if (!field) return;

    const row = field.closest('.p-contact__row');
    if (!row) return;

    let existingError = row.querySelector('.custom-error');

    if (existingError) {
      existingError.textContent = message;
    } else {
      const error = document.createElement('p');
      error.className = 'custom-error';
      error.textContent = message;

      const head = row.querySelector('.p-contact__head');
      const data = row.querySelector('.p-contact__data');
      const isEmailOrTextarea =
        field.type === 'email' || field.tagName.toLowerCase() === 'textarea';
      const isPc = window.matchMedia('(min-width: 768px)').matches;

      if (isEmailOrTextarea && data && isPc) {
        head?.appendChild(error);
      } else if (data) {
        data.after(error);
      } else {
        head?.appendChild(error);
      }
    }

    if (field.classList) {
      field.classList.add('p-contact__input-error');
    }
    field.querySelectorAll?.('input, textarea, select')?.forEach((input) => {
      input.classList.add('p-contact__input-error');
    });
  }

  function clearError(field) {
    if (!field) return;

    const row = field.closest('.p-contact__row');
    if (row) {
      row.querySelectorAll('.custom-error').forEach((el) => el.remove());
    }

    if (field.classList) {
      field.classList.remove('p-contact__input-error');
    }
    field.querySelectorAll?.('input, textarea, select')?.forEach((input) => {
      input.classList.remove('p-contact__input-error');
    });
    field.querySelectorAll?.('.wpcf7-list-item-label')?.forEach((label) => {
      label.classList.remove('is-error');
    });
  }

  function validateContactForm(form) {
    form
      .querySelectorAll('.wpcf7-not-valid-tip, .custom-error')
      .forEach((el) => el.remove());

    let isValid = true;

    const nameField = form.querySelector('input[name="your-name"]');
    if (nameField) {
      if (nameField.value.trim() === '') {
        showError(nameField, '※入力してください');
        isValid = false;
      } else {
        clearError(nameField);
      }
    }

    form.querySelectorAll('.p-contact__data-radio').forEach((group) => {
      const radioButtons = group.querySelectorAll('input[type="radio"]');
      if (radioButtons.length === 0) return;

      const isChecked = Array.from(radioButtons).some((radio) => radio.checked);

      if (isChecked) {
        clearError(group);
      } else {
        showError(group, '※選択してください');
        group.querySelectorAll('.wpcf7-list-item-label').forEach((label) => {
          label.classList.add('is-error');
        });
        isValid = false;
      }
    });

    const acceptanceGroup = form.querySelector('.p-contact__acceptance');
    const privacyCheckbox = form.querySelector('input[name="your-acceptance"]');
    if (acceptanceGroup && privacyCheckbox) {
      if (!privacyCheckbox.checked) {
        showError(acceptanceGroup, '※同意が必要です');
        acceptanceGroup
          .querySelectorAll('.wpcf7-list-item-label')
          .forEach((label) => {
            label.classList.add('is-error');
          });
        isValid = false;
      } else {
        clearError(acceptanceGroup);
      }
    }

    const emailField = form.querySelector('input[name="your-email"]');
    if (emailField) {
      const emailValue = emailField.value.trim();
      if (emailValue === '') {
        showError(emailField, '※入力してください');
        isValid = false;
      } else if (!emailPattern.test(emailValue)) {
        showError(emailField, '※有効なメールアドレスを入力してください');
        isValid = false;
      } else {
        clearError(emailField);
      }
    }

    const messageField = form.querySelector('textarea[name="your-message"]');
    if (messageField) {
      if (messageField.value.trim() === '') {
        showError(messageField, '※入力してください');
        isValid = false;
      } else {
        clearError(messageField);
      }
    }

    return isValid;
  }

  document.addEventListener(
    'submit',
    function (event) {
      const form = event.target.closest('.wpcf7-form');
      if (!form || !form.classList.contains('p-contact__form')) return;

      if (!validateContactForm(form)) {
        event.preventDefault();
        event.stopPropagation();
      }
    },
    true,
  );
});

// アニメーション
window.addEventListener('load', function () {
  const sheep1 = document.querySelector('.sheep1');

  // タイムラインを作成
  const tl = gsap.timeline({ repeat: -1 });

  function animateSheep1() {}
  tl.to(sheep1, {
    duration: 18,
    x: '18vw',
    y: 30,
    ease: 'linear',
  });

  tl.to(sheep1, {
    duration: 1,
    rotationY: 180,
  });

  tl.to(sheep1, {
    duration: 22,
    x: '-10vw',
    y: 20,
  });

  tl.to(sheep1, {
    duration: 0.3,
    rotationY: 0,
  });
  tl.to(sheep1, {
    duration: 8,
    x: 0,
    y: 0,
  });

  gsap.to(sheep1, {
    duration: 0.5,
    rotation: '8deg',
    repeat: -1, // 永久ループ
    yoyo: true, // 往復する
    ease: 'sine.inOut', // 滑らかに揺れる
  });

  // 永遠に羊が跳ねるアニメーション
  const sheep2 = document.querySelector('.sheep2');

  function randomJump() {
    let jumpHeight = gsap.utils.random(10, 50);
    let pauseTime = gsap.utils.random(0.5, 2); // ランダムな休憩時間

    const tl = gsap.timeline();

    tl.to(sheep2, {
      duration: 0.8,
      rotation: '10deg',
      yoyo: true,
      repeat: 3,
      ease: 'sine.inOut',
    });

    tl.to(sheep2, {
      y: -jumpHeight,
      rotation: '10deg',
      duration: 0.6,
      ease: 'power1.out',
    });

    tl.to(sheep2, {
      y: 0,
      rotation: '0',
      duration: 1,
      ease: 'power1.in',
    });

    tl.call(() => {
      setTimeout(randomJump, pauseTime * 1000);
    });
  }

  const sheep3 = document.querySelector('.sheep3');

  function forwardWavyJump() {
    // タイムラインを作成（無限ループ）
    const tl = gsap.timeline({ repeat: -1 });

    gsap.to(sheep3, {
      duration: 0.5,
      rotation: '6deg',
      yoyo: true,
      repeat: -1,
      ease: 'sine.inOut',
    });

    tl.to(sheep3, {
      x: '-20vw',
      y: -20,
      duration: 18,
      ease: 'linear',
    });

    tl.to(sheep3, {
      rotationY: 180,
      duration: 0.3,
    });

    tl.to(sheep3, {
      x: '-15vw',
      y: 20,
      duration: 10,
    });

    tl.to(sheep3, {
      x: 0,
      y: 0,
      duration: 16,
      ease: 'power1.out',
    });
  }

  animateSheep1();
  randomJump();
  forwardWavyJump();
});

gsap.set('body', {
  opacity: 1,
});

const LOADING_ACCESS_KEY = 'access';

const hideLoading = (loadingEl) => {
  if (!loadingEl) return;
  gsap.set(loadingEl, { display: 'none' });
};

const markLoadingSeen = () => {
  sessionStorage.setItem(LOADING_ACCESS_KEY, '0');
};

const splitIntoChars = (target) => {
  try {
    if (typeof SplitText !== 'undefined') {
      return new SplitText(target, { type: 'chars' }).chars;
    }
    if (typeof SplitType !== 'undefined') {
      return new SplitType(target, { types: 'chars' }).chars;
    }
  } catch (error) {
    console.warn('Loading text split failed:', error);
  }
  return null;
};

const initFvHidden = () => {
  const fvTitle = document.querySelector('.p-fv__title');
  const fvText = document.querySelector('.p-fv__text');
  const targets = [fvTitle, fvText].filter(Boolean);

  if (!targets.length) return;

  gsap.set(targets, { opacity: 0 });
};

const playFvEntrance = () => {
  const fvTitle = document.querySelector('.p-fv__title');
  const fvText = document.querySelector('.p-fv__text');

  if (!fvTitle && !fvText) return;

  if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
    gsap.set([fvTitle, fvText].filter(Boolean), { opacity: 1, filter: 'none' });
    return;
  }

  const tl = gsap.timeline();

  if (fvTitle) {
    tl.fromTo(
      fvTitle,
      { opacity: 0, filter: 'blur(8px)' },
      { opacity: 1, filter: 'blur(0px)', duration: 1, ease: 'power2.out' },
    );
  }

  if (fvText) {
    const chars = splitIntoChars(fvText);

    if (!chars?.length) {
      tl.to(fvText, { opacity: 1, duration: 0.8 }, fvTitle ? '-=0.5' : 0);
      return;
    }

    tl.set(fvText, { opacity: 1 }, fvTitle ? '-=0.6' : 0).from(
      chars,
      {
        opacity: 0,
        duration: 1.15,
        ease: 'power3.out',
        stagger: {
          each: 0.045,
          from: 'start',
        },
      },
      fvTitle ? '-=0.5' : 0,
    );
  }
};

const finishLoading = () => {
  markLoadingSeen();
  playFvEntrance();
};

const initLoading = () => {
  const loadingEl = document.querySelector('#loading');
  const loadingText = document.querySelector('.p-loading__text');
  const splitTarget = document.querySelector('.p-loading__text .split');

  if (sessionStorage.getItem(LOADING_ACCESS_KEY)) {
    hideLoading(loadingEl);
    playFvEntrance();
    return;
  }

  if (!loadingEl || !loadingText || !splitTarget) {
    hideLoading(loadingEl);
    finishLoading();
    return;
  }

  if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
    hideLoading(loadingEl);
    finishLoading();
    return;
  }

  const runLoadingAnimation = () => {
    const chars = splitIntoChars(splitTarget);

    if (!chars?.length) {
      hideLoading(loadingEl);
      finishLoading();
      return;
    }

    const loadingTL = gsap.timeline({
      onComplete: finishLoading,
    });

    loadingTL.addLabel('start', 0.5);

    chars.forEach((char, index) => {
      const position = index === 0 ? 'start' : '-=0.36';

      loadingTL
        .to(
          char,
          {
            y: -20,
            duration: 0.16,
            ease: 'power2.inOut',
          },
          position,
        )
        .to(
          char,
          {
            y: 0,
            duration: 0.16,
            ease: 'power2.inOut',
          },
          '-=0.04',
        );
    });

    loadingTL
      .to(loadingEl, {
        y: '-100%',
        duration: 0.8,
        ease: 'power2.out',
      })
      .set(loadingEl, { display: 'none', clearProps: 'transform' });
  };

  if (document.fonts?.ready) {
    document.fonts.ready.then(runLoadingAnimation);
  } else {
    runLoadingAnimation();
  }
};

initFvHidden();
initLoading();
